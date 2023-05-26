<!DOCTYPE html>
<html lang="es">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lista de Profesores</title>
	<link href="../CSS/pro.css" rel="stylesheet" >
</head>
<body>
	<div class="container">
		<div >
			<h2 class="h2">Lista de Profesores</h2>
			<hr />

			<?php
            // VALOR aksi es para borrar aqui esta la funcion borrar
			if(isset($_GET['aksi']) == 'delete'){
				// escaping, additionally removing everything that could be (html/javascript-) code
				$nik = mysqli_real_escape_string($con,(strip_tags($_GET["nik"],ENT_QUOTES)));
                $miConsulta = "select * from profesor where codigo='$nik'"; //buscar el empleado que tenga en el campo codigo lo que hay en la variable $nik para ser eliminado
				$cek = mysqli_query($con,$miConsulta);
				if(mysqli_num_rows($cek) == 0){
					echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No se encontraron datos.</div>';
				}else{
					$delete = mysqli_query($con, "DELETE FROM profesor WHERE codigo='$nik'");
					if($delete){
						echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Datos eliminado correctamente.</div>';
					}else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, no se pudo eliminar los datos.</div>';
					}
				}
			}
			?>
<!--Si lo necesitan este es una lista para filtrar datos-->
			<form  method="get">
				<div class="form-group">
					<select name="filter" class="form-control" onchange="form.submit()">
						<option value="0">Filtros de datos por</option>
						<!--Estos son los campos que deben modificar si desean aplicar filtros-->
						<?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL);  ?>
						<option value="1" <?php if($filter == 'Tetap'){ echo 'selected'; } ?>>Activo</option>
						<option value="2" <?php if($filter == 'Kontrak'){ echo 'selected'; } ?>>Inactivo</option>
                        <option value="2" <?php if($filter == 'Kontrak'){ echo 'selected'; } ?>>Grupo</option>
						<option value="2" <?php if($filter == 'Kontrak'){ echo 'selected'; } ?>>Grado</option>
					</select>
				</div>
			</form>
			<br />

			<div class="g">
			<table  class="table">
				<!--Aqui se agregan los campos que van a mostrar en la tabla los titulos solamente-->
				<tr>
                    <th>No</th>
					<th>Nombre</th>
                    <th>Apellido Materno</th>
                    <th>Apellido Paterno</th>
					<th>RFC</th>
					<th>calle</th>
					<th>Numero de casa</th>
					<th>colonia</th>
					<th>Cedula</th>
					<th>Telefono</th>
                    <th>Correo</th>
					<th>Estado</th>
					<th>Contraseña</th>
					<th>Acciones</th>
					
                    
				</tr>
				<?php
				/**aqui se hace la consulta
				 * si no necesitan el filtro deberan borrar esta parte del codigo que va desde 
				 * AQUI
				 */
				include 'conexion.php';
				if($filter){
                    $miConsulta = "select * from profesor";   //crear una consulta que muestre a todos los empleados de la tabla empleados 
                                        //que coincidan con el contenido del campo estado y de la variable $filter
					$sql = mysqli_query($con, $miConsulta);
				}
				$sql = "SELECT * FROM profesor";
                $result = mysqli_query($con, $sql);

                if (mysqli_num_rows($result) == 0) {
                    ?>
                            <script>
                            document.addEventListener("DOMContentLoaded", function() {
                            // Tu código SweetAlert aquí
                            swal({
                                title: "¿Ah caray?",
                                text: "No se encontraron datos",
                                icon: "info",
                                button: "Listo"
                            }).then(function() {
                                window.location.href = "../PHP/mostrar_profesores.php";
                            });
                        });
                            </script>
                            <?php
                } else {
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>
                                <td>'.$row['id_profesor'].'</td>
                                <td>'.$row['nombre'].'</td>
								<td>'.$row['apellido_P'].'</td>
                                <td>'.$row['apellido_M'].'</td>
								<td>'.$row['RFC'].'</td>
                                <td>'.$row['calle'].'</td>
								<td>'.$row['no'].'</td>
                                <td>'.$row['colonia'].'</td>
								<td>'.$row['cedula'].'</td>
                                <td>'.$row['telefono'].'</td>
								<td>'.$row['correo'].'</td>
                                <td>'.$row['estado_act'].'</td>
								<td>'.$row['password'].'</td>
                                
								
                                <td>
								<a href="editar_profesor.php?nik='.$row['id_profesor'].'"><i class="bi bi-clipboard">Editar</i></a>
								<a href="mostrar_profesores.php?nik='.$row['id_profesor'].'" name="aksi"><i class="bi bi-trash">Borrar</a></i>
                                </td>
                            </tr>';
                        $no++;
                    }
                }
                ?>
				
			</table>
			</div>
		




		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>