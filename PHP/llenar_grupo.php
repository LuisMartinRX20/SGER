<?php
include('conexion.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link href="../CSS/grupo.css" rel="stylesheet" type="text/css">
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
				$id_alumno  = mysqli_real_escape_string($con,(strip_tags($_POST["id_alumno"],ENT_QUOTES)));//Escanpando caracteres 
				
				/*consulta que verifica que no exista otro igual */
                $miConsulta = "select * from lista_grupo where id_grupo ='$id_grupo'"; //crear consulta que seleccione el registro donde el campo codigo sea igual a la variable $codigo
                $cek = mysqli_query($con, $miConsulta);
                /*condicion */
                
                        /*inserta los valores que estan en los campos de texto */
                        $miConsulta = "INSERT INTO lista_grupo (id_grupo, id_alumno)
                         VALUES ('$id_grupo','$id_alumno')"; //crear la consulta del INSERT INTO 
						$insert = mysqli_query($con, $miConsulta) or die(mysqli_error($con));
						if($insert){
                            ?>
                            <script>
                           document.addEventListener("DOMContentLoaded", function() {
                            // Tu código SweetAlert aquí
                            swal({
                                title: "Genial",
                                text: "Alumno insertado al grupo correctamente",
                                icon: "success",
                                button: "Listo"
                            }).then(function() {
                                window.location.href = "../PHP/mostrar_lista.php";
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
                                        window.location.href = "../PHP/llenar_grupo.php";
                                    });
                                });
                                    </script>
                                    <?php						
                                }
                            }
                      
			?>
        <!-- formulario -->
        <form action="llenar_grupo.php" method="POST" class="form">
                <div class="formulario">
                    <div class="pagina1 active" id="contenido1">
                        <!-- Pagina 1 -->
                        <p class="encabezado2">Datos del Grupo</p>
                        <br>
                        <label for="id_profe">Seleccionar Grupo:</label>
                            <select id="grupo" name="id_grupo">
                                <option value="">Selecciona Grupo</option>
                                <?php 
                                include '../PHP/obtener_grupo.php';
                                foreach ($grupos as $grupo) { ?>
                                    <option value="<?php echo $grupo['id']; ?>">
                                        <?php echo $grupo['grado'] . ' ' . $grupo['grupo'] . ' ' . $grupo['profe']; ?>
                                    </option>
                                <?php } ?>
                            </select>

                        <label for="id_profe">Seleccionar Alumno:</label>
                            <select id="id_profe" name="id_alumno">
                                <option value="">Alumnos</option>
                                <?php 
                                include '../PHP/obtener_alumno.php';
                                foreach ($alumnos as $alumno) { ?>
                                    <option value="<?php echo $alumno['id']; ?>">
                                    <?php echo $alumno['nombre'] . ' ' . $alumno['control'] ?>
                                   </option>
                                <?php } ?>
                            </select>
                        <!-- Indica en qué página se encuentra agregar manualmente -->
                        <p>Pagina 1 de 1</p>
                        <input type="submit" name="enviar" value="Enviar" id="boton" class="botonA2">
                    </div>
                    
                </div>
            </form>

    </div>
    <script src="../JS/paginaficha.js"></script>
</body>
</html>