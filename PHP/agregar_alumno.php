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
                $curp	 = mysqli_real_escape_string($con,(strip_tags($_POST["curp"],ENT_QUOTES)));//Escanpando caracteres 
				$fecha_nac	 = mysqli_real_escape_string($con,(strip_tags($_POST["fecha_nac"],ENT_QUOTES)));//Escanpando caracteres 
				$calle	     = mysqli_real_escape_string($con,(strip_tags($_POST["calle"],ENT_QUOTES)));//Escanpando caracteres 
				$no		 = mysqli_real_escape_string($con,(strip_tags($_POST["no"],ENT_QUOTES)));//Escanpando caracteres 
				$colonia			 = mysqli_real_escape_string($con,(strip_tags($_POST["colonia"],ENT_QUOTES)));//Escanpando caracteres 
                $cp			 = mysqli_real_escape_string($con,(strip_tags($_POST["cp"],ENT_QUOTES)));//Escanpando caracteres 
                $nombreT			 = mysqli_real_escape_string($con,(strip_tags($_POST["nombreT"],ENT_QUOTES)));//Escanpando caracteres 
                $apT			 = mysqli_real_escape_string($con,(strip_tags($_POST["apT"],ENT_QUOTES)));//Escanpando caracteres 
                $apmT			 = mysqli_real_escape_string($con,(strip_tags($_POST["apmT"],ENT_QUOTES)));//Escanpando caracteres 
                $fecha_nacT			 = mysqli_real_escape_string($con,(strip_tags($_POST["fecha_nacT"],ENT_QUOTES)));//Escanpando caracteres 
                $calleT			 = mysqli_real_escape_string($con,(strip_tags($_POST["calleT"],ENT_QUOTES)));//Escanpando caracteres 
                $noT			 = mysqli_real_escape_string($con,(strip_tags($_POST["noT"],ENT_QUOTES)));//Escanpando caracteres 
                $coloniaT		 = mysqli_real_escape_string($con,(strip_tags($_POST["coloniaT"],ENT_QUOTES)));//Escanpando caracteres 
                $cpT		 = mysqli_real_escape_string($con,(strip_tags($_POST["cpT"],ENT_QUOTES)));//Escanpando caracteres 
                $telT		 = mysqli_real_escape_string($con,(strip_tags($_POST["telT"],ENT_QUOTES)));//Escanpando caracteres 
				/*consulta que verifica que no exista otro igual */
                $miConsulta = "select * from ficha where curp ='$curp'"; //crear consulta que seleccione el registro donde el campo codigo sea igual a la variable $codigo
                $cek = mysqli_query($con, $miConsulta);
                /*condicion */
                if(mysqli_num_rows($cek) == 0){
                        /*inserta los valores que estan en los campos de texto */
                        $miConsulta = "INSERT INTO ficha (Nombre,ApeP,ApeM,curp,fecha_nac,calle,Provincia,Poblacion,CP,nombreT,ApeP_T,ApeM_T,fecha_nac_T,calle_T,provincia_T,Poblacion_T,CP_T,telefono ,precio) VALUES('{$_POST["nombre"]}','{$_POST["ap"]}','{$_POST["apm"]}','{$_POST["curp"]}','{$_POST["fecha_nac"]}','{$_POST["calle"]}','{$_POST["no"]}','{$_POST["colonia"]}','{$_POST["cp"]}','{$_POST["nombreT"]}','{$_POST["apT"]}','{$_POST["apmT"]}','{$_POST["fecha_nacT"]}','{$_POST["calleT"]}','{$_POST["noT"]}','{$_POST["coloniaT"]}','{$_POST["cpT"]}','{$_POST["telT"]}',300)"; //crear la consulta del INSERT INTO 
						$insert = mysqli_query($con, $miConsulta) or die(mysqli_error());
						if($insert){
                            /**Alerta de se hizo el registro */
							echo '<script type="text/javascript">
                            alert("Ficha Guardada");
                            </script>';
						}else{
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudo guardar los datos !</div>';
						}
                    }
                else{
                    /**Alerta de que existe el registro cambiar a lo que se este registrando */
                    echo '<script type="text/javascript">
                            alert("Curp ya existe");
                            </script>';
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