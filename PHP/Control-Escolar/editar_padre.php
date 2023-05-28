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
	<title>Datos del Padre</title>

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
	<div class="container">
		<div class="content">
			<h2>Datos del Padre &raquo; Editar datos</h2>
			<hr />
			
			<?php
			include '../PHP/conexion.php';
			// escaping, additionally removing everything that could be (html/javascript-) code
			$nik = mysqli_real_escape_string($con,(strip_tags($_GET["nik"],ENT_QUOTES)));
            //Buscar en el campo codigo el dato que coindica con la variable $nik para editar el registro
            $miConsulta = "select * from padre where id_padre='{$_GET["nik"]}'"; 
			$sql = mysqli_query($con, $miConsulta);
			if(mysqli_num_rows($sql) == 0){
				/**RETORNA A LA TABLA ANTERIOR */
				header("Location: mostrar_padres.php");
				
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			if(isset($_POST['save'])){
                $id_padre = mysqli_real_escape_string($con, (strip_tags($_POST["id_padre"], ENT_QUOTES))); // Escapando caracteres
                $nombre = mysqli_real_escape_string($con, (strip_tags($_POST["nombre"], ENT_QUOTES))); // Escapando caracteres
                $apellidoP = mysqli_real_escape_string($con, (strip_tags($_POST["apellidoP"], ENT_QUOTES))); // Escapando caracteres
                $apellidoM = mysqli_real_escape_string($con, (strip_tags($_POST["apellidoM"], ENT_QUOTES))); // Escapando caracteres
                $calle = mysqli_real_escape_string($con, (strip_tags($_POST["calle"], ENT_QUOTES))); // Escapando caracteres
                $no = mysqli_real_escape_string($con, (strip_tags($_POST["no"], ENT_QUOTES))); // Escapando caracteres
                $colonia = mysqli_real_escape_string($con, (strip_tags($_POST["colonia"], ENT_QUOTES))); // Escapando caracteres
                $CP = mysqli_real_escape_string($con, (strip_tags($_POST["CP"], ENT_QUOTES))); // Escapando caracteres
                $fecha_nac = mysqli_real_escape_string($con, (strip_tags($_POST["fecha_nac"], ENT_QUOTES))); // Escapando caracteres
                $fecha_registro = mysqli_real_escape_string($con, (strip_tags($_POST["fecha_registro"], ENT_QUOTES))); // Escapando caracteres
                $estado_act = mysqli_real_escape_string($con, (strip_tags($_POST["estado_act"], ENT_QUOTES))); // Escapando caracteress
                $correo = mysqli_real_escape_string($con, (strip_tags($_POST["correo"], ENT_QUOTES))); // Escapando caracteres
                $telefono = mysqli_real_escape_string($con, (strip_tags($_POST["telefono"], ENT_QUOTES))); // Escapando caracteres
                $password = mysqli_real_escape_string($con, (strip_tags($_POST["password"], ENT_QUOTES))); // Escapando caracteres
                                
                
                $miConsulta = "UPDATE padre set 
                            id_padre='$id_padre',
                            nombre = '$nombre',
                            apellidoP = '$apellidoP',
                            apellidoM = '$apellidoM',
                            calle = '$calle',
                            no = '$no',
                            colonia = '$colonia',
                            CP='$CP',
                            fecha_nac = '$fecha_nac',
                            fecha_registro = '$fecha_registro',
                            estado_act = '$estado_act',
                            correo = '$correo',
                            telefono = '$telefono',
                            password = '$password'
                            WHERE id_padre = '$id_padre' "; //Crear el UPDATE para el campo codigo igual a variable $nik
                
				$update = mysqli_query($con, $miConsulta) or die(mysqli_error($con));
				if($update){
					header("Location: editar_padre.php?nik=".$nik."&pesan=sukses");
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
						window.location.href = "../PHP/mostrar_padres.php"; // Página a la que deseas redirigir después de la eliminación
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
					window.location.href = "../PHP/mostrar_padres.php"; // Página a la que deseas redirigir después de la eliminación
				});})
				</script>
				<?php			}
			?>
			<form class="form-horizontal" action="" method="POST">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">ID Padre</label>
                        <div class="col-sm-2">
                            <input type="text" name="id_padre" value="<?php echo $row['id_padre']; ?>" class="form-control" placeholder="ID Materia" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nombre del Padre</label>
                        <div class="col-sm-4">
                            <input type="text" name="nombre" value="<?php echo $row['nombre']; ?>" class="form-control" placeholder="Nombre de la materia" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Apellido Paterno</label>
                        <div class="col-sm-4">
                            <input type="text" name="apellidoP" value="<?php echo $row['apellidoP']; ?>" class="form-control" placeholder="Apellido Paterno" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Apellido Materno</label>
                        <div class="col-sm-4">
                            <input type="text" name="apellidoM" value="<?php echo $row['apellidoM']; ?>" class="form-control" placeholder="Apellido Materno" required>
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
                        <label class="col-sm-3 control-label">CP</label>
                        <div class="col-sm-4">
                            <input type="text" name="CP" value="<?php echo $row['CP']; ?>" class="form-control" placeholder="Cédula" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Fecha Nacimiento</label>
                        <div class="col-sm-4">
                            <input type="text" name="fecha_nac" value="<?php echo $row['fecha_nac']; ?>" class="form-control" placeholder="Teléfono" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Fecha registro</label>
                        <div class="col-sm-4">
                            <input type="text" name="fecha_registro" value="<?php echo $row['fecha_registro']; ?>" class="form-control" placeholder="Teléfono" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Estado Actual</label>
                        <div class="col-sm-4">
                            <input type="text" name="estado_act" value="<?php echo $row['estado_act']; ?>" class="form-control" placeholder="Estado Actual" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Correo</label>
                        <div class="col-sm-4">
                            <input type="email" name="correo" value="<?php echo $row['correo']; ?>" class="form-control" placeholder="Correo" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Teléfono</label>
                        <div class="col-sm-4">
                            <input type="text" name="telefono" value="<?php echo $row['telefono']; ?>" class="form-control" placeholder="Teléfono" required>
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
                            <a href="../PHP/mostrar_padres.php" class="btn btn-sm btn-danger">Cancelar</a>
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