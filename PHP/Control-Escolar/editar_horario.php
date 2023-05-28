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
	<link href="../CSS/edit_horario.css" rel="stylesheet">
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
            $miConsulta = "select * from horario where id_horario='$nik'"; 
			$sql = mysqli_query($con, $miConsulta);
			if(mysqli_num_rows($sql) == 0){
				/**RETORNA A LA TABLA ANTERIOR */
				header("Location: mostrar_horarios.php");
				
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
            if (isset($_POST['save'])) {
                $id_horario = mysqli_real_escape_string($con, (strip_tags($_POST["id_horario"], ENT_QUOTES)));
                $n_materias = mysqli_real_escape_string($con, (strip_tags($_POST["n_materias"], ENT_QUOTES)));
                $grado = mysqli_real_escape_string($con, (strip_tags($_POST["grado"], ENT_QUOTES)));
                $turno = mysqli_real_escape_string($con, (strip_tags($_POST["turno"], ENT_QUOTES)));
                $id_grupo = mysqli_real_escape_string($con, (strip_tags($_POST["grupo"], ENT_QUOTES)));
            
                // Validar que los campos no estén vacíos
                if (!empty($id_horario) && !empty($n_materias)  && !empty($turno) && !empty($id_grupo)) {
                    if ($turno === '1') {
                        $miConsulta = "UPDATE horario SET id_horario='$id_horario', id_materia='$n_materias', nombre_materia='Basico', hora_inicio='8:00', hora_fin='12:30', id_grupo='$id_grupo' WHERE id_horario='$nik'";
                    } else {
                        $miConsulta = "UPDATE horario SET id_horario='$id_horario', id_materia='$n_materias', nombre_materia='Basico', hora_inicio='14:00', hora_fin='18:00', id_grupo='$id_grupo' WHERE id_horario='$nik'";
                    }
                    
                    $update = mysqli_query($con, $miConsulta) or die(mysqli_error($con));
            
                    if ($update) {
                        ?>
                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                swal({
                                    title: "",
                                    text: "Se modificaron los datos de manera correcta",
                                    icon: "success",
                                    button: "Listo"
                                }).then(function() {
                                    window.location.href = "../PHP/mostrar_horarios.php";
                                });
                            });
                        </script>
                        <?php
                    } else {
                        ?>
                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                swal({
                                    title: "",
                                    text: "Ocurrió un error inesperado",
                                    icon: "error",
                                    button: "Listo"
                                }).then(function() {
                                    window.location.href = "../PHP/editar_horario.php";
                                });
                            });
                        </script>
                        <?php
                    }
                } else {
                   ?>
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            swal({
                                title: "",
                                text: "Por favor, completa todos los campos",
                                icon: "warning",
                                button: "OK"
                            });
                        });
                    </script>
                    <?php
                }
            }
            
?>            

         <div class="vid">
                        <form class="form-horizontal" action="" method="POST">
                            <div class="form-group">
                                <label for="grupo" class="col-sm-3 control-label">Grupo:</label>
                                <div class="col-sm-6">
                                    <select id="grupo" name="grupo" class="form-control">
                                        <option value="">Selecciona Grupo</option>
                                        <?php 
                                        include '../PHP/obtener_grupo.php';
                                        foreach ($grupos as $grupo) { ?>
                                            <option value="<?php echo $grupo['id']; ?>">
                                                <?php echo $grupo['grado'] . ' ' . $grupo['grupo'] . ' ' . $grupo['profe']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="numeromaterias" class="col-sm-3 control-label">Número de materias:</label>
                                <div class="col-sm-6">
                                    <select name="n_materias" id="n_materias" class="form-control">
                                        <option value="6">Mínimo 6 materias</option>
                                        <option value="8">Máximo 8 materias</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="turno" class="col-sm-3 control-label">Turno:</label>
                                <div class="col-sm-6">
                                    <select name="turno" id="turno" class="form-control">
                                        <option value="2">Vespertino</option>
                                        <option value="1">Matutino</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="id_horario" class="col-sm-3 control-label">ID Horario:</label>
                                <div class="col-sm-2">
                                    <input type="text" name="id_horario" value="<?php echo $row['id_horario']; ?>" class="form-control" placeholder="ID horario" required>
                                </div>
                            </div>

                            
                            <div class="form-group">
                                <label class="col-sm-3 control-label">&nbsp;</label>
                                <div class="col-sm-6">
                                    <input type="submit" name="save" class="boton" value="Guardar datos">
                                    <a href="../PHP/mostrar_horarios.php" class="boton">Cancelar</a>
                                </div>
                            </div>

                            
                        </form>
                    </div>

		

		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</body>
</html>