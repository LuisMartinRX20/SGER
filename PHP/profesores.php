<?php
include("conexion.php");
session_start();
if(!isset($_SESSION['username'])){
	header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../CSS/profesores.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	<title>Lista de Profesores</title>

</head>
<body>
	<div>
		<div>
			<h2>Lista de Profesores</h2>
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
						<option value="0">Filtros de datos de empleados</option>
						<!--Estos son los campos que deben modificar si desean aplicar filtros-->
						<?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL);  ?>
						<option value="1" <?php if($filter == 'Tetap'){ echo 'selected'; } ?>>Activo</option>
						<option value="2" <?php if($filter == 'Kontrak'){ echo 'selected'; } ?>>NO Activo</option>
                        
					</select>
				</div>
			</form>
			<br />
			<div >
			<table  class="tabladatos">
				<!--Aqui se agregan los campos que van a mostrar en la tabla los titulos solamente-->
				<tr>
                    <th>No</th>
					<th>Código</th>
					<th>Nombre</th>
                    <th>Lugar de nacimiento</th>
                    <th>Fecha de nacimiento</th>
					<th>Teléfono</th>
					<th>Cargo</th>
					<th>Estado</th>
                    <th>Acciones</th>
				</tr>
				<?php
				/**aqui se hace la consulta
				 * si no necesitan el filtro deberan borrar esta parte del codigo que va desde 
				 * AQUI
				 */
				if($filter){
                    $miConsulta = "select * from profesor";   //crear una consulta que muestre a todos los empleados de la tabla empleados 
                                        //que coincidan con el contenido del campo estado y de la variable $filter
					$sql = mysqli_query($con, $miConsulta);
				}else{
                    $miConsulta = "select * from profesor"; //crear una consulta que muestre a todos los empleados de la tabla empleados ordenadas por el campo código
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
					echo '<tr><td colspan="8">No hay datos.</td><td><a href="#"><i class="bi bi-clipboard">Editar</i></a> <br> <a href="#"><i class="bi bi-trash">Borrar</i></a></td></tr>';
					echo '';
				}else{
					$no = 1;
					while($row = mysqli_fetch_assoc($sql)){
						/**en esta parte deben poner los campos de la base de datos debe conincidir el nombre
						 * con la base de datos si es necesario agregar mas 
						 */
						echo '
						<tr>
							
							<td>'.$row['profesor_id'].'</td>
							<td><a href="profile.php?nik='.$row['profesor_id'].'"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> '.$row['nombre'].'</a></td>
                            <td>'.$row['lugar_nacimiento'].'</td>
                            <td>'.$row['fecha_nacimiento'].'</td>
							<td>'.$row['telefono'].'</td>
                            <td>'.$row['puesto'].'</td>
							<td>';
							/**
							 * este es un apartado para roles si no lo necesitan pueden borrarlo
							 */
							if($row['estado'] == '1'){
								echo '<span class="label label-success">Fijo</span>';
							}
                            else if ($row['estado'] == '2' ){
								echo '<span class="label label-info">Contratado</span>';
							}
                            else if ($row['estado'] == '3' ){
								echo '<span class="label label-warning">Outsourcing</span>';
							}
							/**
							 * estos son botones los cuales sirven para eliminar y editar deben poner los campos de
							 * la base de datos correspondientes
							 */
						echo '
							</td>
							<td>

								<a href="edit.php?nik='.$row['codigo'].'" title="Editar datos" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
								<a href="empleados.php?aksi=delete&nik='.$row['codigo'].'" title="Eliminar" onclick="return confirm(\'Esta seguro de borrar los datos '.$row['nombres'].'?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
							</td>
						</tr>
						';
						$no++;
					}
				}
				?>
				
			</table>
			</div>
		




		</div>
	</div><center>
    
		</center>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>