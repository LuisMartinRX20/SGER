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
	<title>Datos del Alumno</title>

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
			<h2>Datos del Alumno &raquo; Editar datos</h2>
			<hr />
			
			<?php
			include '../PHP/conexion.php';
			// escaping, additionally removing everything that could be (html/javascript-) code
			$nik = mysqli_real_escape_string($con,(strip_tags($_GET["nik"],ENT_QUOTES)));
            //Buscar en el campo codigo el dato que coindica con la variable $nik para editar el registro
            $miConsulta = "select * from alumno where id_alumno='{$_GET["nik"]}'"; 
			$sql = mysqli_query($con, $miConsulta);
			if(mysqli_num_rows($sql) == 0){
				/**RETORNA A LA TABLA ANTERIOR */
				header("Location: mostrar_alumno.php");
				
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			if(isset($_POST['save'])){
                $id_alumno = mysqli_real_escape_string($con, (strip_tags($_POST["id_alumno"], ENT_QUOTES))); // Escapando caracteres
                $nombre = mysqli_real_escape_string($con, (strip_tags($_POST["nombre"], ENT_QUOTES))); // Escapando caracteres
                $apellido_P = mysqli_real_escape_string($con, (strip_tags($_POST["apellido_P"], ENT_QUOTES))); // Escapando caracteres
                $apellido_M = mysqli_real_escape_string($con, (strip_tags($_POST["apellido_M"], ENT_QUOTES))); // Escapando caracteres
                $curp = mysqli_real_escape_string($con, (strip_tags($_POST["curp"], ENT_QUOTES))); // Escapando caracteres
                $fecha_nac = mysqli_real_escape_string($con, (strip_tags($_POST["fecha_nac"], ENT_QUOTES))); // Escapando caracteres
                $fecha_registro = mysqli_real_escape_string($con, (strip_tags($_POST["fecha_registro"], ENT_QUOTES))); // Escapando caracteres
                $estado_act = mysqli_real_escape_string($con, (strip_tags($_POST["estado_act"], ENT_QUOTES))); // Escapando caracteress

                $id_grupo = mysqli_real_escape_string($con, (strip_tags($_POST["id_grupo"], ENT_QUOTES))); // Escapando caracteres
                $grado = mysqli_real_escape_string($con, (strip_tags($_POST["grado"], ENT_QUOTES))); // Escapando caracteres
                $id_padre = mysqli_real_escape_string($con, (strip_tags($_POST["id_padre"], ENT_QUOTES))); // Escapando caracteress
                                
                
                $miConsulta = "UPDATE alumno set 
                            id_alumno='$id_alumno',
                            nombre = '$nombre',
                            apellido_P = '$apellido_P',
                            apellido_M = '$apellido_M',
                            curp = '$curp',
                            fecha_nac = '$fecha_nac',
                            fecha_registro = '$fecha_registro',
                            estado_act = '$estado_act',
                            id_grupo='$id_grupo',
                            grado='$grado',
                            id_padre='$id_padre'
                            WHERE id_alumno = '$id_alumno' "; //Crear el UPDATE para el campo codigo igual a variable $nik
                
				$update = mysqli_query($con, $miConsulta) or die(mysqli_error($con));
				if($update){
					header("Location: editar_alumno.php?nik=".$nik."&pesan=sukses");
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
						window.location.href = "../PHP/mostrar_alumno.php"; // Página a la que deseas redirigir después de la eliminación
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
					window.location.href = "../PHP/mostrar_alumno.php"; // Página a la que deseas redirigir después de la eliminación
				});})
				</script>
				<?php			}
			?>
			<form class="form-horizontal" action="" method="POST">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">ID Alumno</label>
                        <div class="col-sm-2">
                            <input type="text" name="id_alumno" value="<?php echo $row['id_alumno']; ?>" class="form-control" placeholder="ID Materia" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nombre del Alumno</label>
                        <div class="col-sm-4">
                            <input type="text" name="nombre" value="<?php echo $row['nombre']; ?>" class="form-control" placeholder="Nombre de la materia" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Apellido Paterno</label>
                        <div class="col-sm-4">
                            <input type="text" name="apellido_P" value="<?php echo $row['apellido_P']; ?>" class="form-control" placeholder="Apellido Paterno" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Apellido Materno</label>
                        <div class="col-sm-4">
                            <input type="text" name="apellido_M" value="<?php echo $row['apellido_M']; ?>" class="form-control" placeholder="Apellido Materno" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Calle</label>
                        <div class="col-sm-4">
                            <input type="text" name="curp" value="<?php echo $row['curp']; ?>" class="form-control" placeholder="curp" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Fecha Nacimiento</label>
                        <div class="col-sm-4">
                            <input type="text" name="fecha_nac" value="<?php echo $row['fecha_nac']; ?>" class="form-control" placeholder="fecha nacimiento" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Fecha registro</label>
                        <div class="col-sm-4">
                            <input type="text" name="fecha_registro" value="<?php echo $row['fecha_registro']; ?>" class="form-control" placeholder="fecha registro" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Estado Actual</label>
                        <div class="col-sm-4">
                            <input type="text" name="estado_act" value="<?php echo $row['estado_act']; ?>" class="form-control" placeholder="Estado Actual" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Grupo</label>
                        <div class="col-sm-4">
                            <input type="text" name="id_grupo" value="<?php echo $row['id_grupo']; ?>" class="form-control" placeholder="Grupo" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Grado</label>
                        <div class="col-sm-4">
                            <input type="text" name="grado" value="<?php echo $row['grado']; ?>" class="form-control" placeholder="Grado" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">ID Padre</label>
                        <div class="col-sm-2">
                            <input type="text" name="id_padre" value="<?php echo $row['id_padre']; ?>" class="form-control" placeholder="ID Padre" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">&nbsp;</label>
                        <div class="col-sm-6">
                            <input type="submit" name="save" class="btn btn-sm btn-primary" value="Guardar datos">
                            <a href="../PHP/mostrar_alumno.php" class="btn btn-sm btn-danger">Cancelar</a>
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