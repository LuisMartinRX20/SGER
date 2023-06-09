<?php
require('conexion.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link href="../../CSS/Control-Escolar/grupoGa.css" rel="stylesheet" type="text/css">
    <title>Grupo</title>
</head>
<body>
    <div class="container">
           <?php
            /*Variables para obtener el valor de los campos 
            aqui deben poner el nombre de los inputs */
			if(isset($_POST['enviar'])){
                /**si se necesitan mas variables copiar y pegar si no borrar las que sobran */
				$id_grupo	= mysqli_real_escape_string($con,(strip_tags($_POST["id_grupo"],ENT_QUOTES)));//Escanpando caracteres 
				$grado      = mysqli_real_escape_string($con,(strip_tags($_POST["grado"],ENT_QUOTES)));//Escanpando caracteres 
				$grupo	    = mysqli_real_escape_string($con,(strip_tags($_POST["grupo"],ENT_QUOTES)));//Escanpando caracteres 
                $id_profe    = mysqli_real_escape_string($con,(strip_tags($_POST["id_profe"],ENT_QUOTES)));//Escanpando caracteres 
				$cantidad	= mysqli_real_escape_string($con,(strip_tags($_POST["cantidad"],ENT_QUOTES)));//Escanpando caracteres 
				
				/*consulta que verifica que no exista otro igual */
                $miConsulta = "select * from grupo where id_grupo ='$id_grupo'"; //crear consulta que seleccione el registro donde el campo codigo sea igual a la variable $codigo
                $cek = mysqli_query($con, $miConsulta);
                /*condicion */
                if(mysqli_num_rows($cek) == 0){
                        /*inserta los valores que estan en los campos de texto */
                        $miConsulta = "INSERT INTO grupo (id_grupo, grado, grupo, id_profe, cantidad_alumnos)
                         VALUES (' ','$grado','$grupo','$id_profe,','$cantidad')"; //crear la consulta del INSERT INTO 
						$insert = mysqli_query($con, $miConsulta) or die(mysqli_error($con));
						if($insert){
                            ?>
                            <script>
                           document.addEventListener("DOMContentLoaded", function() {
                            // Tu código SweetAlert aquí
                            swal({
                                title: "Genial",
                                text: "Grupo insertado correctamente",
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
                                title: "¿A caray?",
                                text: "Hubo un problema al registrar Grupo",
                                icon: "error",
                                button: "Listo"
                            }).then(function() {
                                window.location.href = "../PHP/agregar_grupo.php";
                            });
                        });
                            </script>
                            <?php						}
                    }
                else{
                    ?>
            <script>
           document.addEventListener("DOMContentLoaded", function() {
            // Tu código SweetAlert aquí
            swal({
                title: "",
                text: "Ya existe este grupo",
                icon: "info",
                button: "Listo"
            }).then(function() {
                window.location.href = "../PHP/agregar_grupo.php";
            });
        });
            </script>
            <?php
                }
			}
			?>
        <!-- formulario -->
        <form action="agregar_grupo.php" method="POST" class="form">
                <div class="formulario">
                    <div class="pagina1 active" id="contenido1">
                        <!-- Pagina 1 -->
                        <p class="encabezado2">Ingresa los siguientes datos</p>
                        <br>
                        <!-- campos del formulario cambiar los que sean necesarios máximo 4 por página -->
                        <label for="grupo">Grupo</label>
                        
                        <select id="grupo" name="grupo" required>
                            <option value="0">Selecciona el nombre</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                        </select>


                        <label for="id_profe">Seleccionar profesor</label>
                        <select id="id_profe" name="id_profe" required>
                            <option value="">Seleccionar un Profesor</option>
                            <?php 
                            include 'obtener_profesor.php';
                            foreach ($profes as $profe) { ?>
                                <option value="<?php echo $profe['id']; ?>">
                                <?php echo $profe['nombre']; ?></option>
                            <?php } ?>
                        </select>
                 
                        <label for="id_grudo">Seleccionar profesor</label>
                        <select id="grado" name="grado" required>
                            <option value="0">Selecciona el grado</option>
                            <option value="1">1°</option>
                            <option value="2">2°</option>
                            <option value="3">3°</option>
                            <option value="4">4°</option>
                            <option value="5">5°</option>
                            <option value="6">6°</option>

                        </select>
                        
                        <label for="cantidad">Cantidad de alumnos</label>
                        <input type="text" name="cantidad" id="cantidad" required>
                        <!-- Indica en qué página se encuentra agregar manualmente -->
                        <input type="submit" name="enviar" value="Enviar" id="boton" class="botonA2">
                    </div>
                    
                </div>
            </form>

    </div>
    <script src="../JS/paginacion_controlEscolar.js"></script>
</body>
</html>