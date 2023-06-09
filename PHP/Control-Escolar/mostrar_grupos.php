
<!DOCTYPE html>
<html lang="es">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../../CSS/Control-Escolar/mostrar_tablaG.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	<title>Lista de Profesores</title>

</head>
<body>
	<div class="container">
		<div >
			<h2 class="h2">Lista de Grupos</h2>
			<hr />

			<?php
			include 'conexion.php';
            // VALOR aksi es para borrar aqui esta la funcion borrar
			if(isset($_GET['aksi']) == 'delete'){
				// escaping, additionally removing everything that could be (html/javascript-) code
				$nik = mysqli_real_escape_string($con,(strip_tags($_GET["nik"],ENT_QUOTES)));
                $miConsulta = "select * from grupo where id_grupo='$nik'"; //buscar el empleado que tenga en el campo codigo lo que hay en la variable $nik para ser eliminado
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
									window.location.href = "../PHP/mostrar_grupos.php";
								});
							});
					</script>
					<?php
				}else{
					$delete = mysqli_query($con, "DELETE FROM grupo WHERE id_grupo='$nik'");
					if($delete){
						?>
						<script>
								document.addEventListener("DOMContentLoaded", function() {
								// Tu código SweetAlert aquí
								swal({
									title: "",
									text: "Se elimino el Grupo de forma correcta",
									icon: "success",
									button: "Listo"
								}).then(function() {
									window.location.href = "../PHP/mostrar_grupos.php";
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
									text: "No se pudo eliminar el Grupo",
									icon: "error",
									button: "Listo"
								}).then(function() {
									window.location.href = "../PHP/mostrar_grupos.php";
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
							<option value="0" >Filtros de datos por</option>
							<!--Estos son los campos que deben modificar si desean aplicar filtros-->
							<?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL);  ?>

							<option value="A" <?php if($filter == 'A'){ echo 'selected'; } ?>>A</option>
							<option value="B" <?php if($filter == 'B'){ echo 'selected'; } ?>>B</option>
							<option value="C" <?php if($filter == 'C'){ echo 'selected'; } ?>>C</option>
							<option value="1" <?php if($filter == '1'){ echo 'selected'; } ?>>Grado 1</option>
							<option value="2" <?php if($filter == '2'){ echo 'selected'; } ?>>Grado 2</option>
							<option value="3" <?php if($filter == '3'){ echo 'selected'; } ?>>Grado 3</option>
							<option value="4" <?php if($filter == '4'){ echo 'selected'; } ?>>Grado 4</option>
							<option value="5" <?php if($filter == '5'){ echo 'selected'; } ?>>Grado 5</option>
							<option value="6" <?php if($filter == '6'){ echo 'selected'; } ?>>Grado 6</option>
						</select>
					</div>
				</form>
				<br />

				<div class="g">
					<table class="table">
						<!--Aqui se agregan los campos que van a mostrar en la tabla los titulos solamente-->
						<tr>
							<th>No</th>
							<th>Grado</th>
							<th>Grupo</th>
							<th>Profesor</th>
							<th>Cantidad de alumnos</th>
							<th>Acciones</th>
						</tr>
						<?php
						include 'conexion.php';
						/**aqui se hace la consulta
						* si no necesitan el filtro deberan borrar esta parte del codigo que va desde 
						* AQUI
						*/
						if($filter){
							if ($filter == '1' || $filter == '2' || $filter == '3' || $filter == '4' ||
							 $filter == '5' || $filter == '6') {
								$miConsulta = "SELECT * FROM grupo WHERE grado = '$filter'"; // Consulta con filtro por grado
							} else {
								$miConsulta = "SELECT * FROM grupo WHERE grupo = '$filter'"; // Consulta con filtro por grupo
							}
							$sql = mysqli_query($con, $miConsulta);
						} else {
							$miConsulta = "SELECT * FROM grupo"; // Consulta sin filtro
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
							
							<td>'.$row['id_grupo'].'</td>
							<td>'.$row['grado'].'</td>
                            <td>'.$row['grupo'].'</td>
							<td>'.$row['id_profe'].'</td>
                            <td>'.$row['cantidad_alumnos'].'</td>
							<td> 
								<a href="editar_grupos.php?nik='.$row['id_grupo'].'"><i class="bi bi-clipboard">Editar</i></a> <br> 
								<a href="mostrar_grupos.php?aksi=delete&nik='.$row['id_grupo'].'" name="aksi"><i class="bi bi-trash">Borrar</i></a>
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