<?php
require('conexion.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../CSS/formularioAl.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>SGER:FIcha</title>
</head>
<body>
    <div class="fondo">
            <?php
            /*Variables para obtener el valor de los campos 
            aqui deben poner el nombre de los inputs */
			if(isset($_POST['enviar'])){
                /**si se necesitan mas variables copiar y pegar si no borrar las que sobran */
				
				$id_alumno = ''; // Valor autoincremental, puedes dejarlo vacío
                $noControl = mysqli_real_escape_string($con, (strip_tags($_POST["n_control"], ENT_QUOTES)));
                $nombre = mysqli_real_escape_string($con, (strip_tags($_POST["nombre"], ENT_QUOTES))); // Escapa y elimina caracteres especiales del campo 'nombre'
                $apellido_P = mysqli_real_escape_string($con, (strip_tags($_POST["ap"], ENT_QUOTES)));
                $apellido_M = mysqli_real_escape_string($con, (strip_tags($_POST["apm"], ENT_QUOTES)));
                $curp = mysqli_real_escape_string($con, (strip_tags($_POST["curp"], ENT_QUOTES)));
                $fecha_nac = mysqli_real_escape_string($con, (strip_tags($_POST["fecha_nac"], ENT_QUOTES)));
                $fecha_registro = mysqli_real_escape_string($con, (strip_tags($_POST["fecha_reg"], ENT_QUOTES)));
                $estado_act = mysqli_real_escape_string($con, (strip_tags($_POST["estatus"], ENT_QUOTES)));
                $id_grupo = mysqli_real_escape_string($con, (strip_tags($_POST["Grupo"], ENT_QUOTES)));
                $grado = mysqli_real_escape_string($con, (strip_tags($_POST["Grado"], ENT_QUOTES)));
                $id_padre = mysqli_real_escape_string($con, (strip_tags($_POST["IdPadre"], ENT_QUOTES))); 
				/*consulta que verifica que no exista otro igual */
                $miConsulta = "select * from alumno where nombre ='$nombre'"; //crear consulta que seleccione el registro donde el campo codigo sea igual a la variable $codigo
                $cek = mysqli_query($con, $miConsulta);
                /*condicion */
                if(mysqli_num_rows($cek) == 0){
                        /*inserta los valores que estan en los campos de texto */
                        $query = "INSERT INTO alumno (id_alumno, noControl, nombre, apellido_P, apellido_M, curp, fecha_nac, 
                        fecha_registro, estado_act, id_grupo, grado, id_padre)
                        VALUES ('$id_alumno', '$noControl', '$nombre', '$apellido_P', '$apellido_M', '$curp', '$fecha_nac', 
                        '$fecha_registro', '$estado_act', '$id_grupo', '$grado', '$id_padre')";

						$insert = mysqli_query($con, $miConsulta) or die(mysqli_error($con));
						if($insert){
                            ?>
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                        // Tu código SweetAlert aquí
                        swal({
                                title: "Genial!",
                                text: "Se Registro un alumno con éxito",
                                icon: "success",
                                button: "Listo"
                            }).then(function() {
                                window.location.href = "../PHP/mostar_alumno.php";
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
                                        title: "",
                                        text: "Ocurrio un error inesperado",
                                        icon: "error",
                                        button: "Listo"
                                    }).then(function() {
                                        window.location.href = "../PHP/agregar_alumno.php";
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
                                text: "El alumno ya extiste",
                                icon: "info",
                                button: "Listo"
                            }).then(function() {
                                window.location.href = "../PHP/agregar_alumno.php";
                            });
                        });
                    </script>
         <?php
                }
			}
			?>
        <!-- formulario -->
            <form action="agregar_alumno.php" method="post" class="form">
            <div class="formulario">
            
                <div class="pagina1 active " id="contenido1">
                     <!-- Pagina 1 -->
                    <p  class="encabezado2">Datos del Alumno</p>
                    <br>
                    <!-- campos del formulario cambiar los que sean necesarios maximo 4 por pagina-->
                    <p>Nombre</p>
                    <!-- input donde se obtienen datos cambiar el nombre("name") ah el nombre del campo
                        que se esta menejando y ponerlos en las variables de arria -->
                    <input type="text" name="nombre" id="informacion">
                    <p>Apellido Paterno</p>
                    <input type="text" name="ap" id="informacion">
                    <p>Apellido Materno</p>
                    <input type="text" name="apm" id="informacion">
                    <p>CURP</p>
                    <input type="text" name="curp" id="informacion">
                      <!--Indica en que pagina se encuentra agregar manualmente -->
                    <p>Pagina 1 de 3</p>
                    
                    <!--boton que cambia de ventana a la siguiente -->
                    <button type="button" class="botonS1" id="boton">Siguiente</button>
                    
                </div>
                 <!-- Pagina 2 -->
                <div class="pagina2 " id="contenido2">
                <p  class="encabezado2">Datos del Alumno</p>
                    <br>
                    <p >N°Control</p>
                    <input type="text" name="n_control" id="informacion">
                    <p>Fecha nacimiento</p>
                    <input type="date" name="fecha_nac" id="informacion">
                    <p>Fecha Registro</p>
                    <input type="date" name="fecha_reg" id="informacion">
                    <p>ID Padre</p>
                    <input type="text" name="Idpadre" id="informacion">
                      <!--Indica en que pagina se encuentra agregar manualmente -->
                    <p>Pagina 2 de 3</p>
                    
                    
                  <!--boton que cambia de ventana a la anterior -->
                    <button type="button" class="botonA1" id="boton">Anterior</button>
                    <!--boton que cambia de ventana a la siguiente -->
                    <button type="button" class="botonS2" id="boton">Siguiente</button>
                </div>
                <!--Pagina 3 -->
                <div class="pagina3 "  id="contenido3">
               
                <p  class="encabezado3">Datos del Alumno</p>
                <br>
                    <p>Grupo</p>
                    <input type="text" name="Grupo" id="informacion">
                    <p>Grado</p>
                    <input type="text" name="Grado" id="informacion">
                    <label for="estatus">Estatus:</label>
                            <select id="estatus" name="estatus" required>
                                <option value="">Selecciona una opción</option>
                                <option value="Activo">Activo</option>
                                <option value="Inactivo">Inactivo</option>
                            </select>
                    <br><br><br>
                    <!--Indica en que pagina se encuentra agregar manualmente -->
                    <p>Pagina 3 de 3</p>
                    <!--boton que cambia de ventana a la anterior -->
                    <button type="button" class="botonA2" id="boton">Anterior</button>
                    <!--boton que envia el formulario -->
                    <input type="submit" name="enviar"  value= "Enviar" id="boton" class="botonA2">
                </div>
               
                    
            </div>
            </form>
    </div>
    <script src="../JS/paginaficha.js"></script>
</body>
</html>