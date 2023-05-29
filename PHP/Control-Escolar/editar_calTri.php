<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Datos de la Materia</title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-datepicker.css" rel="stylesheet">
	<link href="../../CSS/Control-Escolar/editarGa.css" rel="stylesheet">
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>
<body>
	
	<div class="container">
		<div class="content">
			<h2>Calificaciones &raquo; Editar Calificacion</h2>
			<hr />
			
			<?php
			include 'conexion.php';
			// escaping, additionally removing everything that could be (html/javascript-) code
			$nik = mysqli_real_escape_string($con,(strip_tags($_GET["nik"],ENT_QUOTES)));
            //Buscar en el campo codigo el dato que coindica con la variable $nik para editar el registro
            $miConsulta = "select * from calificaciones where id_materia='{$_GET["nik"]}'"; 
			$sql = mysqli_query($con, $miConsulta);
			if(mysqli_num_rows($sql) == 0){
				/**RETORNA A LA TABLA ANTERIOR */
				header("Location: ../PHP/Mostar_AluCal.php");
				
			}else{
				$row = mysqli_fetch_assoc($sql);
			}

			if(isset($_POST['save'])){
				$id = mysqli_real_escape_string($con,(strip_tags($_POST["id_materia"],ENT_QUOTES)));//Escanpando caracteres 
				$cal = mysqli_real_escape_string($con,(strip_tags($_POST["cal"],ENT_QUOTES)));//Escanpando caracteres 
				
                
                $miConsulta = "UPDATE calificaciones set calif_P1='$cal' where id_materia='$id' "; //Crear el UPDATE para el campo codigo igual a variable $nik
                $update = mysqli_query($con, $miConsulta) or die(mysqli_error($con));

				if($update){
					header("Location: editar_calTri.php?nik=".$nik."&pesan=sukses");
				}else{
					?>
					<script>
					document.addEventListener("DOMContentLoaded", function() {
					swal({
						title: "",
						text: "Ocurrio un error inesperado",
						icon: "error",
						button: "Listo"
					}).then(function() {
						window.location.href = "../PHP/editar_calTri.php"; // Página a la que deseas redirigir después de la eliminación
					});})
					</script>
					<?php				}
			}
			
			if(isset($_GET['pesan']) == 'sukses'){
				?>
				<script>
			document.addEventListener("DOMContentLoaded", function() {
				swal({
					title: "",
					text: "Se modifico la calificacion de manera correcta",
					icon: "success",
					button: "Listo"
				}).then(function() {
					window.location.href = "../PHP/buscarAlumno_Cal.php"; // Página a la que deseas redirigir después de la eliminación
				});})
				</script>
				<?php			}
			?>
			<form class="form-horizontal" action="" method="post">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Materia</label>
                    <div class="col-sm-2">
                        <input type="text" name="id_materia" value="<?php echo $row['id_materia']; ?>" class="form-control" placeholder="Materia" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Calificacion</label>
                    <div class="col-sm-4">
                        <input type="text" name="cal" value="<?php echo $row['calif_P1']; ?>" class="form-control" placeholder="Calificacion" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">&nbsp;</label>
                    <div class="col-sm-6">
                        <input type="submit" name="save" class="btn btn-sm btn-primary" value="Guardar datos">
                        <a href="buscarAlumno_Cal.php" class="btn btn-sm btn-danger">Cancelar</a>
                    </div>
                </div>
            </form>

		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</body>
</html>