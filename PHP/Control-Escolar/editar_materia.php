<!DOCTYPE html>
<html lang="es">
<head>
<!--
Project      : Datos de empleados con PHP, MySQLi y Bootstrap CRUD  (Create, read, Update, Delete) 
Author		 : Obed Alvarado
Website		 : http://www.obedalvarado.pw
Blog         : https://obedalvarado.pw/blog/
Email	 	 : info@obedalvarado.pw
-->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Datos de la Materia</title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-datepicker.css" rel="stylesheet">
	<link href="../CSS/editarGa.css" rel="stylesheet">
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	
	
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<?php include("nav.php");?>
	</nav>
	<div class="container">
		<div class="content">
			<h2>Datos de la materias &raquo; Editar datos</h2>
			<hr />
			
			<?php
			include 'conexion.php';
			// escaping, additionally removing everything that could be (html/javascript-) code
			$nik = mysqli_real_escape_string($con,(strip_tags($_GET["nik"],ENT_QUOTES)));
            //Buscar en el campo codigo el dato que coindica con la variable $nik para editar el registro
            $miConsulta = "select * from materia where id_materia='{$_GET["nik"]}'"; 
			$sql = mysqli_query($con, $miConsulta);
			if(mysqli_num_rows($sql) == 0){
				/**RETORNA A LA TABLA ANTERIOR */
				header("Location: mostrar_materias.php");
				
			}else{
				$row = mysqli_fetch_assoc($sql);
			}

			if(isset($_POST['save'])){
				$id_materia = mysqli_real_escape_string($con,(strip_tags($_POST["id_materia"],ENT_QUOTES)));//Escanpando caracteres 
				$nombre_materia = mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));//Escanpando caracteres 
				
                
                $miConsulta = "UPDATE materia set id_materia='$id_materia', nombre='$nombre_materia' where id_materia='$nik' "; //Crear el UPDATE para el campo codigo igual a variable $nik
                $update = mysqli_query($con, $miConsulta) or die(mysqli_error($con));

				if($update){
					header("Location: editar_materia.php?nik=".$nik."&pesan=sukses");
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
						window.location.href = "../PHP/mostrar_materias.php"; // Página a la que deseas redirigir después de la eliminación
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
					text: "Se Modificaron los datos de manera correcta",
					icon: "success",
					button: "Listo"
				}).then(function() {
					window.location.href = "../PHP/mostrar_materias.php"; // Página a la que deseas redirigir después de la eliminación
				});})
				</script>
				<?php			}
			?>
			<form class="form-horizontal" action="" method="post">
                <div class="form-group">
                    <label class="col-sm-3 control-label">ID Materia</label>
                    <div class="col-sm-2">
                        <input type="text" name="id_materia" value="<?php echo $row['id_materia']; ?>" class="form-control" placeholder="ID Materia" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Nombre de la materia</label>
                    <div class="col-sm-4">
                        <input type="text" name="nombre" value="<?php echo $row['nombre']; ?>" class="form-control" placeholder="Nombre de la materia" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">&nbsp;</label>
                    <div class="col-sm-6">
                        <input type="submit" name="save" class="btn btn-sm btn-primary" value="Guardar datos">
                        <a href="../PHP/mostrar_materias.php" class="btn btn-sm btn-danger">Cancelar</a>
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