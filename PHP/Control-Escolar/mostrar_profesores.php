<!DOCTYPE html>
<html lang="es">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lista de Profesores</title>
	<link href="../../CSS/Control-Escolar/prof.css" rel="stylesheet" >
</head>
<body>
	<div class="container">
		<div >
			<h2 class="h2">Lista de Profesores</h2>
			<hr />

			<?php
			include 'conexion.php';
            // VALOR aksi es para borrar aqui esta la funcion borrar
			if(isset($_GET['aksi']) == 'delete'){
				// escaping, additionally removing everything that could be (html/javascript-) code
				$nik = mysqli_real_escape_string($con,(strip_tags($_GET["nik"],ENT_QUOTES)));
                $miConsulta = "select * from profesor where id_profesor='$nik'"; //buscar el empleado que tenga en el campo codigo lo que hay en la variable $nik para ser eliminado
				$cek = mysqli_query($con,$miConsulta);
				if(mysqli_num_rows($cek) == 0){
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
				}else{
					$delete = mysqli_query($con, "DELETE FROM profesor WHERE id_profesor='$nik'");
					if($delete){
						?>
						<script>
								document.addEventListener("DOMContentLoaded", function() {
								// Tu código SweetAlert aquí
								swal({
									title: "",
									text: "Se elimino el Profesor de forma correcta",
									icon: "success",
									button: "Listo"
								}).then(function() {
									window.location.href = "../PHP/mostrar_profesores.php";
								});
							});
						</script>
						<?php

					}else{
						?>
						<script>
								document.addEventListener("DOMContentLoaded", function() {
								// Tu código SweetAlert aquí
								swal({
									title: "¿Ah caray?",
									text: "No se pudo eliminar el profesor",
									icon: "error",
									button: "Listo"
								}).then(function() {
									window.location.href = "../PHP/mostrar_profesores.php";
								});
							});
						</script>
						<?php					}
				}
			}
			?>
<!--Si lo necesitan este es una lista para filtrar datos-->
			<form  method="get">
				<div class="form-group">
					<select name="filter" class="form-control" onchange="form.submit()">
						<option value="">Filtros de datos por</option>
						<!--Estos son los campos que deben modificar si desean aplicar filtros-->
						<?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL);  ?>
						<option value="1" <?php if($filter == '1'){ echo 'selected'; } ?>>Activo</option>
						<option value="2" <?php if($filter == '2' ){ echo 'selected'; } ?>>Inactivo</option>
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
				if ($filter) {
					if ($filter === '1' || $filter === '2'){
						$miConsulta = "SELECT * FROM profesor WHERE estado_act = '$filter' "; // Consulta con filtro por estado
					} 
					$sql = mysqli_query($con, $miConsulta);
				} else {
					$miConsulta = "SELECT * FROM profesor"; // Consulta sin filtro
					$sql = mysqli_query($con, $miConsulta);
				}
                if (mysqli_num_rows($sql) == 0) {
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
                    while ($row = mysqli_fetch_assoc($sql)) {
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
								';if($row['estado_act']==1){
									echo'<td>Activo</td>';
								}
								else{
									echo'<td>Activo</td>';
								}
								echo'
                                <td>'.$row['estado_act'].'</td>
								<td>'.$row['password'].'</td>
                                
								
                                <td>
								<a href="editar_profesor.php?nik='.$row['id_profesor'].'"><i class="bi bi-clipboard">Editar</i></a>
								<a href="mostrar_profesores.php?aksi=delete&nik='.$row['id_profesor'].'" name="aksi"><i class="bi bi-trash">Borrar</i></a>
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