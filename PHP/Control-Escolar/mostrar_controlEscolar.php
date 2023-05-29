
<!DOCTYPE html>
<html lang="es">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../../CSS/Control-Escolar/mostrarGa.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	<title>Lista de Profesores</title>

</head>
<body>
	<div>
		<div >
			<h2 class="h2">Lista de Personal control Escolar</h2>
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
						<option value="1" <?php if($filter == '1'){ echo 'selected'; } ?>>Activo</option>
						<option value="2" <?php if($filter == '2'){ echo 'selected'; } ?>>Inactivo</option>
                        
					</select>
				</div>
			</form>
			<br />

			<div >
			<table  class="tabladatos">
				<!--Aqui se agregan los campos que van a mostrar en la tabla los titulos solamente-->
				<tr>
                    <th>No</th>
					<th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>RFC</th>
					<th>Direccion</th>
                    <th>Telegono</th>
                    <th>Correo</th>
					<th>Estadp</th>
					<th>Cotraseña</th>
					<th>Acciones</th>
					
                    
				</tr>
				<?php
				require('conexion.php');
				/**aqui se hace la consulta
				 * si no necesitan el filtro deberan borrar esta parte del codigo que va desde 
				 * AQUI
				 */
				if($filter){
                    $miConsulta = "select * from control_escolar where estado_act='$filter'";   //crear una consulta que muestre a todos los empleados de la tabla empleados 
                                        //que coincidan con el contenido del campo estado y de la variable $filter
					$sql = mysqli_query($con, $miConsulta);
				}else{
                    $miConsulta = "select * from control_escolar"; //crear una consulta que muestre a todos los empleados de la tabla empleados ordenadas por el campo código
					$sql = mysqli_query($con, $miConsulta);
				}
				/**
				 * HASTA AQUI
				 */
				if(mysqli_num_rows($sql) == 0){
					/***
					 * en cuanto funcione toda la parte de base de datos sustitir las etiquetas i en la parte de botnes 
					 * en la parte de abajo pero sin quitar funcionalidad
					 */
				
					echo '';
				}else{
					$no = 1;
					while($row = mysqli_fetch_assoc($sql)){
						/**en esta parte deben poner los campos de la base de datos debe conincidir el nombre
						 * con la base de datos si es necesario agregar mas 
						 */
						echo '
						<tr>
							
							<td>'.$row['id_controlE'].'</td>
							<td>'.$row['nombre'].'</a></td>
                            <td>'.$row['apellido_P'].'</td>
                            <td>'.$row['apellido_M'].'</td>
							<td>'.$row['RFC'].'</td>
                            <td>'.$row['calle'].' '.$row['no'].' Colonia '.$row['colonia'].'</td>
							<td>'.$row['telefono'].'</td>
							<td>'.$row['correo'].'</td>
							';if($row['estado_act']==1){
								echo'<td>Activo</td>';
							}
							else{
								echo'<td>Activo</td>';
							}
							echo'
							<td>'.$row['password'].'</td>
							
						
							<td>
								<a href="edidar_control.php?nik='.$row['id_controlE'].'"><i class="bi bi-clipboard">Editar</i></a>
								<a href="mostrar_controlEscolar.php?aksi=delete&nik='.$row['id_controlE'].'" name="aksi"><i class="bi bi-trash">Borrar</i></a>
                                </td>
						
						';
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