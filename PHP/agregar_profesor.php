<?php
require('conexion.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../CSS/formulario.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <title>SGER:FIcha</title>
</head>
<body>
    <div class="fondo">

           <?php
            /*Variables para obtener el valor de los campos 
            aqui deben poner el nombre de los inputs */
			if(isset($_POST['enviar'])){
                /**si se necesitan mas variables copiar y pegar si no borrar las que sobran */
				$nombre		     = mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));//Escanpando caracteres 
				$ap		     = mysqli_real_escape_string($con,(strip_tags($_POST["ap"],ENT_QUOTES)));//Escanpando caracteres 
				$apm	 = mysqli_real_escape_string($con,(strip_tags($_POST["apm"],ENT_QUOTES)));//Escanpando caracteres 
                $RFC	 = mysqli_real_escape_string($con,(strip_tags($_POST["RFC"],ENT_QUOTES)));//Escanpando caracteres 
				
				$calle	     = mysqli_real_escape_string($con,(strip_tags($_POST["calle"],ENT_QUOTES)));//Escanpando caracteres 
				$no		 = mysqli_real_escape_string($con,(strip_tags($_POST["no"],ENT_QUOTES)));//Escanpando caracteres 
				$colonia			 = mysqli_real_escape_string($con,(strip_tags($_POST["colonia"],ENT_QUOTES)));//Escanpando caracteres 
                $cedula			 = mysqli_real_escape_string($con,(strip_tags($_POST["cedula"],ENT_QUOTES)));//Escanpando caracteres 
                $tel		 = mysqli_real_escape_string($con,(strip_tags($_POST["telefono"],ENT_QUOTES)));//Escanpando caracteres 

                $correo			 = mysqli_real_escape_string($con,(strip_tags($_POST["correo"],ENT_QUOTES)));//Escanpando caracteres 
                $estadoA		 = mysqli_real_escape_string($con,(strip_tags($_POST["estatus"],ENT_QUOTES)));//Escanpando caracteres 
                $password		 = mysqli_real_escape_string($con,(strip_tags($_POST["contraseña"],ENT_QUOTES)));//Escanpando caracteres 
                
				/*consulta que verifica que no exista otro igual */
                $miConsulta = "select * from ficha where RFC ='$RFC'"; //crear consulta que seleccione el registro donde el campo codigo sea igual a la variable $codigo
                $cek = mysqli_query($con, $miConsulta);
                /*condicion */
                if(mysqli_num_rows($cek) == 0){
                        /*inserta los valores que estan en los campos de texto */
                        $miConsulta = "INSERT INTO profesor(id_profesor, nombre, apellido_P, apellido_M, RFC, calle, no, 
                        colonia, cedula, telefono, correo,estado_act, password) VALUES (' ', '$nombre', 
                        '$ap', '$apm','$RFC', '$calle','$no','$colonia','$cedula', 
                        '$tel', '$correo','$estadoA', '$password')"; //crear la consulta del INSERT INTO 
						$insert = mysqli_query($con, $miConsulta) or die(mysqli_error($con));
						if($insert){
                            ?>
                            <script>
                            document.addEventListener("DOMContentLoaded", function() {
                            // Tu código SweetAlert aquí
                            swal({
                                title: "Genial",
                                text: "Se Registro un Profesor con éxito",
                                icon: "success",
                                button: "Listo"
                            }).then(function() {
                                window.location.href = "../PHP/mostrar_profesores.php";
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
                                text: "Ocurrio un error desconocido",
                                icon: "error",
                                button: "Listo"
                            }).then(function() {
                                window.location.href = "../PHP/agregar_profesor.php";
                            });
                        });
                            </script>
                            <?php
                        }
                    }
                else{
                    ?>
                    <script>
                    document.addEventListener("DOMContentLoaded", function() {
                    // Tu código SweetAlert aquí
                    swal({
                        title: "",
                        text: "Ya existe este maestro",
                        icon: "info",
                        button: "Listo"
                    }).then(function() {
                        window.location.href = "../PHP/agregar_profesor.php";
                    });
                });
                    </script>
                    <?php
                }
			}
			?>
        <!-- formulario -->
            <form action="agregar_profesor.php" method="post" class="form">
            <div class="formulario">
            
                <div class="pagina1 active " id="contenido1">
                     <!-- Pagina 1 -->
                    <p  class="encabezado2">Datos del Profesor</p>
                    <br>
                    <!-- campos del formulario cambiar los que sean necesarios maximo 4 por pagina-->
                    <p>Nombre</p>
                    <input type="text" name="nombre" id="informacion"required>
                    <p>Apellido Paterno</p>
                    <input type="text" name="ap" id="informacion"required>
                    <p>Apellido Materno</p>
                    <input type="text" name="apm" id="informacion"required>
                    <p>Estado Actividad</p>
                    <select id="estatus" name="estatus" required>
                                <option value="">Selecciona una opción</option>
                                <option value="Activo">Activo</option>
                                <option value="Inactivo">Inactivo</option>
                            </select>
                      <!--Indica en que pagina se encuentra agregar manualmente -->
                    <p>Pagina 1 de 3</p>
                    
                    <!--boton que cambia de ventana a la siguiente -->
                    <button type="button" class="botonS1" id="boton">Siguiente</button>
                    
                </div>
                 <!-- Pagina 2 -->
                <div class="pagina2 " id="contenido2">
                <p  class="encabezado2">Datos de Profesor</p>
                    <br>
                    <p >Calle</p>
                    <input type="text" name="calle" id="informacion"required>
                    <p>No.</p>
                    <input type="text" name="no" id="informacion">
                    <p>Colonia</p>
                    <input type="text" name="colonia" id="informacion"required>
                    <p>Contraseña</p>
                    <input type="text" name="contraseña" id="informacion"required>
                      <!--Indica en que pagina se encuentra agregar manualmente -->
                    <p>Pagina 2 de 3</p>
                    
                    
                  <!--boton que cambia de ventana a la anterior -->
                    <button type="button" class="botonA1" id="boton">Anterior</button>
                    <!--boton que cambia de ventana a la siguiente -->
                    <button type="button" class="botonS2" id="boton">Siguiente</button>
                </div>
                <!--Pagina 3 -->
                <div class="pagina3 "  id="contenido3">
               
                <p  class="encabezado3">Datos de Profesor</p>
                <br>
                    <p>Cedula</p>
                    <input type="text" name="cedula" id="informacion" required>
                    <p>Telefono</p>
                    <input type="text" name="telefono" id="informacion"required>
                    <p>Correo</p>
                    <input type="text" name="correo" id="informacion"required>
                    <p>RFC</p>
                    <input type="text" name="RFC" id="informacion"required>
                    <br>
                    
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