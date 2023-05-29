
<!DOCTYPE html>
<html lang="es">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../../CSS/Control-Escolar/mostrar_padre.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	<title>Lista de Padres</title>

</head>
<body>
	<div class="container">
		<div >
			<h2 class="h2">Lista de Padres</h2>
			<hr />

			<?php
			include 'conexion.php';
            // VALOR aksi es para borrar aqui esta la funcion borrar
			if(isset($_GET['aksi']) == 'delete'){
				// escaping, additionally removing everything that could be (html/javascript-) code
				$nik = mysqli_real_escape_string($con,(strip_tags($_GET["nik"],ENT_QUOTES)));
                $miConsulta = "select * from padre where id_padre='$nik'"; //buscar el empleado que tenga en el campo codigo lo que hay en la variable $nik para ser eliminado
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
									window.location.href = "../PHP/mostrar_padres.php";
								});
							});
					</script>
					<?php
				}else{
					$delete = mysqli_query($con, "DELETE FROM padre WHERE id_padre='$nik'");
					if($delete){
						?>
						<script>
								document.addEventListener("DOMContentLoaded", function() {
								// Tu código SweetAlert aquí
								swal({
									title: "",
									text: "Se elimino el Padre de forma correcta",
									icon: "success",
									button: "Listo"
								}).then(function() {
									window.location.href = "../PHP/mostrar_padres.php";
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
									text: "No se pudo eliminar el padre",
									icon: "error",
									button: "Listo"
								}).then(function() {
									window.location.href = "../PHP/mostrar_padres.php";
								});
							});
						</script>
						<?php					}
				}
			}?>
<!--Si lo necesitan este es una lista para filtrar datos-->
			<form  method="get">
				<div class="form-group">
				<select name="filter" class="form-control" onchange="form.submit()">
							<option value="0" >Filtros de datos por</option>
							<!--Estos son los campos que deben modificar si desean aplicar filtros-->
							<?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL);  ?>

							<option value="1" <?php if($filter == '1'){ echo 'selected'; } ?>>Activo</option>
							<option value="2" <?php if($filter == '0'){ echo 'selected'; } ?>>Inactivo</option>
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
                    <th>Calle</th>
					<th>Numero de casa</th>
					<th>Colonia</th>
                    <th>CP</th>
					<th>Fecha Nacimiento</th>
					<th>Fecha Registro</th>
					<th>Estado de Actividad</th>
                    <th>Correo</th>
					<th>Telefono</th>
                    <th>Contraseña</th>
					<th>Acciones</th>
					
                    
				</tr>
				<?php
				include 'conexion.php';
				/**aqui se hace la consulta
				 * si no necesitan el filtro deberan borrar esta parte del codigo que va desde 
				 * AQUI
				 */
				if($filter){
                    if($filter==='1'|| $filter==='2'){
						$miConsulta = "SELECT * FROM padre WHERE estado_act = '$filter'"; 
					} //que coincidan con el contenido del campo estado y de la variable $filter
					$sql = mysqli_query($con, $miConsulta);
				}else{
                    $miConsulta = "select * from padre"; //crear una consulta que muestre a todos los empleados de la tabla empleados ordenadas por el campo código
					$sql = mysqli_query($con, $miConsulta);
				}
				/**
				 * HASTA AQUI
				 */
				if(mysqli_num_rows($sql) == 0){
					
				}else{
					$no = 1;
					while($row = mysqli_fetch_assoc($sql)){
						
						echo '
						<tr>
						<td>'.$row['id_padre'].'</td>
						<td>'.$row['nombre'].'</td>
						<td>'.$row['apellidoP'].'</td>
						<td>'.$row['apellidoM'].'</td>
						<td>'.$row['calle'].'</td>
						<td>'.$row['no'].'</td>
						<td>'.$row['colonia'].'</td>
						<td>'.$row['CP'].'</td>
						<td>'.$row['fecha_nac'].'</td>
						<td>'.$row['fecha_registro'].'</td>
						';if($row['estado_act']==1){
							echo'<td>Activo</td>';
						}
						else{
							echo'<td>Activo</td>';
						}
						echo'
						<td>'.$row['correo'].'</td>
						<td>'.$row['telefono'].'</td>
						<td>'.$row['password'].'</td>
							<td> 
							<a href="editar_padre.php?nik='.$row['id_padre'].'"><i class="bi bi-clipboard">Editar</i></a> <br> 
							<a href="mostrar_padres.php?aksi=delete&nik='.$row['id_padre'].'" name="aksi"><i class="bi bi-trash">Borrar</i></a>
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