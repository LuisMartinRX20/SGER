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
	<title>Datos del Profesor</title>

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
			<h2>Datos del Profesor &raquo; Editar datos</h2>
			<hr />
			
			<?php
			include 'conexion.php';
			// escaping, additionally removing everything that could be (html/javascript-) code
			$nik = mysqli_real_escape_string($con,(strip_tags($_GET["nik"],ENT_QUOTES)));
            //Buscar en el campo codigo el dato que coindica con la variable $nik para editar el registro
            $miConsulta = "select * from profesor where id_profesor='{$_GET["nik"]}'"; 
			$sql = mysqli_query($con, $miConsulta);
			if(mysqli_num_rows($sql) == 0){
				/**RETORNA A LA TABLA ANTERIOR */
				header("Location: mostrar_profesores.php");
				
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			if(isset($_POST['save'])){
                $id_profesor = mysqli_real_escape_string($con, (strip_tags($_POST["id_profesor"], ENT_QUOTES))); // Escapando caracteres
                $nombre = mysqli_real_escape_string($con, (strip_tags($_POST["nombre"], ENT_QUOTES))); // Escapando caracteres
                $apellido_P = mysqli_real_escape_string($con, (strip_tags($_POST["apellido_P"], ENT_QUOTES))); // Escapando caracteres
                $apellido_M = mysqli_real_escape_string($con, (strip_tags($_POST["apellido_M"], ENT_QUOTES))); // Escapando caracteres
                $RFC = mysqli_real_escape_string($con, (strip_tags($_POST["RFC"], ENT_QUOTES))); // Escapando caracteres
                $calle = mysqli_real_escape_string($con, (strip_tags($_POST["calle"], ENT_QUOTES))); // Escapando caracteres
                $no = mysqli_real_escape_string($con, (strip_tags($_POST["no"], ENT_QUOTES))); // Escapando caracteres
                $colonia = mysqli_real_escape_string($con, (strip_tags($_POST["colonia"], ENT_QUOTES))); // Escapando caracteres
                $cedula = mysqli_real_escape_string($con, (strip_tags($_POST["cedula"], ENT_QUOTES))); // Escapando caracteres
                $telefono = mysqli_real_escape_string($con, (strip_tags($_POST["telefono"], ENT_QUOTES))); // Escapando caracteres
                $correo = mysqli_real_escape_string($con, (strip_tags($_POST["correo"], ENT_QUOTES))); // Escapando caracteres
                $estado_act = mysqli_real_escape_string($con, (strip_tags($_POST["estado_act"], ENT_QUOTES))); // Escapando caracteres
                $password = mysqli_real_escape_string($con, (strip_tags($_POST["password"], ENT_QUOTES))); // Escapando caracteres
                                
                
                $miConsulta = "UPDATE profesor set 
                            nombre = '$nombre',
                            apellido_P = '$apellido_P',
                            apellido_M = '$apellido_M',
                            RFC = '$RFC',
                            calle = '$calle',
                            no = '$no',
                            colonia = '$colonia',
                            cedula = '$cedula',
                            telefono = '$telefono',
                            correo = '$correo',
                            estado_act = '$estado_act',
                            password = '$password'
                            WHERE id_profesor = '$id_profesor'"; //Crear el UPDATE para el campo codigo igual a variable $nik
                
				$update = mysqli_query($con, $miConsulta) or die(mysqli_error($con));
				if($update){
					header("Location: editar_profesor.php?nik=".$nik."&pesan=sukses");
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
						window.location.href = "../PHP/mostrar_profesores.php"; // Página a la que deseas redirigir después de la eliminación
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
					window.location.href = "../PHP/mostrar_profesores.php"; // Página a la que deseas redirigir después de la eliminación
				});})
				</script>
				<?php			}
			?>
			<form class="form-horizontal" action="" method="post">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">ID Profesor</label>
                        <div class="col-sm-2">
                            <input type="text" name="id_profesor" value="<?php echo $row['id_profesor']; ?>" class="form-control" placeholder="ID profesor" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nombre del Profesor</label>
                        <div class="col-sm-4">
                            <input type="text" name="nombre" value="<?php echo $row['nombre']; ?>" class="form-control" placeholder="Nombre" required>
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
                        <label class="col-sm-3 control-label">RFC</label>
                        <div class="col-sm-4">
                            <input type="text" name="RFC" value="<?php echo $row['RFC']; ?>" class="form-control" placeholder="RFC" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Calle</label>
                        <div class="col-sm-4">
                            <input type="text" name="calle" value="<?php echo $row['calle']; ?>" class="form-control" placeholder="Calle" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Número</label>
                        <div class="col-sm-2">
                            <input type="text" name="no" value="<?php echo $row['no']; ?>" class="form-control" placeholder="Número" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Colonia</label>
                        <div class="col-sm-4">
                            <input type="text" name="colonia" value="<?php echo $row['colonia']; ?>" class="form-control" placeholder="Colonia" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Cédula</label>
                        <div class="col-sm-4">
                            <input type="text" name="cedula" value="<?php echo $row['cedula']; ?>" class="form-control" placeholder="Cédula" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Teléfono</label>
                        <div class="col-sm-4">
                            <input type="text" name="telefono" value="<?php echo $row['telefono']; ?>" class="form-control" placeholder="Teléfono" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Correo</label>
                        <div class="col-sm-4">
                            <input type="email" name="correo" value="<?php echo $row['correo']; ?>" class="form-control" placeholder="Correo" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Estado Actual</label>
                        <div class="col-sm-4">
                            <input type="text" name="estado_act" value="<?php echo $row['estado_act']; ?>" class="form-control" placeholder="Estado Actual" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Contraseña</label>
                        <div class="col-sm-4">
                            <input type="password" name="password" value="<?php $row['password']; ?>" class="form-control" placeholder="Contraseña" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">&nbsp;</label>
                        <div class="col-sm-6">
                            <input type="submit" name="save" class="btn btn-sm btn-primary" value="Guardar datos">
                            <a href="../PHP/mostrar_profesor.php" class="btn btn-sm btn-danger">Cancelar</a>
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