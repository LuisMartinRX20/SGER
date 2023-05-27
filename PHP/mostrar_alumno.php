
<!DOCTYPE html>
<html lang="es">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../CSS/pro.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	<title>Lista de Profesores</title>

</head>
<body>
	<div clas="container">
		<div >
			<h2 class="h2">Lista de alumnos</h2>
			<hr />
			<?php
			include 'conexion.php';
            // VALOR aksi es para borrar aqui esta la funcion borrar
			if(isset($_GET['aksi']) == 'delete'){
				// escaping, additionally removing everything that could be (html/javascript-) code
				$nik = mysqli_real_escape_string($con,(strip_tags($_GET["nik"],ENT_QUOTES)));
                $miConsulta = "select * from alumno where id_alumno='$nik'"; //buscar el empleado que tenga en el campo codigo lo que hay en la variable $nik para ser eliminado
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
									window.location.href = "../PHP/mostrar_alumno.php";
								});
							});
					</script>
					<?php
				}else{
					$delete = mysqli_query($con, "DELETE FROM alumno WHERE id_alumno='$nik'");
					if($delete){
						?>
						<script>
								document.addEventListener("DOMContentLoaded", function() {
								// Tu código SweetAlert aquí
								swal({
									title: "",
									text: "Se elimino el Alumno de forma correcta",
									icon: "success",
									button: "Listo"
								}).then(function() {
									window.location.href = "../PHP/mostrar_alumno.php";
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
									text: "No se pudo eliminar el alumno",
									icon: "error",
									button: "Listo"
								}).then(function() {
									window.location.href = "../PHP/mostrar_alumno.php";
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

			<div clas="g" >
			<table  class="table">
				<!--Aqui se agregan los campos que van a mostrar en la tabla los titulos solamente-->
				<tr>
                    <th>No</th>
                    <th>N°Control</th>
					<th>Nombre</th>
                    <th>Apellido Materno</th>
                    <th>Apellido Paterno</th>
					<th>Fecha Nacimiento</th>
					<th>Fecha Registro</th>
					<th>Estado</th>
                    <th>Grupo</th>
                    <th>Curp</th>
					<th>ID Padre</th>
					
					<th>Acciones</th>
					
                    
				</tr>
				<?php
				/**aqui se hace la consulta
				 * si no necesitan el filtro deberan borrar esta parte del codigo que va desde 
				 * AQUI
				 */
				include 'conexion.php';
				if($filter){
                    $miConsulta = "select * from alumno";   //crear una consulta que muestre a todos los empleados de la tabla empleados 
                                        //que coincidan con el contenido del campo estado y de la variable $filter
					$sql = mysqli_query($con, $miConsulta);
				}else{
                    $miConsulta = "select * from alumno"; //crear una consulta que muestre a todos los empleados de la tabla empleados ordenadas por el campo código
					$sql = mysqli_query($con, $miConsulta);
				}
				/**
				 * HASTA AQUI
				 */
				if(mysqli_num_rows($sql) == 0){
				}else{
					$no = 1;
					while($row = mysqli_fetch_assoc($sql)){
						/**en esta parte deben poner los campos de la base de datos debe conincidir el nombre
						 * con la base de datos si es necesario agregar mas 
						 */
						echo '
						<tr>
							
						<td>'.$row['id_alumno'].'</td>
						<td>'.$row['noControl'].'</td>
						<td>'.$row['nombre'].'</td>
						<td>'.$row['apellido_P'].'</td>
						<td>'.$row['apellido_M'].'</td>
						<td>'.$row['fecha_nac'].'</td>
						<td>'.$row['fecha_registro'].'</td>
						<td>'.$row['estado_act'].'</td>
						<td>'.$row['id_grupo'].'</td>
						<td>'.$row['curp'].'</td>
						<td>'.$row['grado'].'</td>
						<td>'.$row['id_padre'].'</td>

						<td>
								<a href="editar_alumno.php?nik='.$row['id_alumno'].'"><i class="bi bi-clipboard">Editar</i></a>
								<a href="mostrar_alumno.php?aksi=delete&nik='.$row['id_alumno'].'" name="aksi"><i class="bi bi-trash">Borrar</i></a>
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
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>