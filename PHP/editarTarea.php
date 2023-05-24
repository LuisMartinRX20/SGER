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
				$tarea  = mysqli_real_escape_string($con,(strip_tags($_POST["tarea"],ENT_QUOTES)));//Escanpando caracteres 
                $instrucciones	 = mysqli_real_escape_string($con,(strip_tags($_POST["instrucciones"],ENT_QUOTES)));//Escanpando caracteres 
				$materia	 = mysqli_real_escape_string($con,(strip_tags($_POST["materia"],ENT_QUOTES)));//Escanpando caracteres 
                $grupo	 = mysqli_real_escape_string($con,(strip_tags($_POST["grupo"],ENT_QUOTES)));//Escanpando caracteres 
				$fecha_venc	     = mysqli_real_escape_string($con,(strip_tags($_POST["fecha_venc"],ENT_QUOTES)));//Escanpando caracteres 
				$hora_venc		 = mysqli_real_escape_string($con,(strip_tags($_POST["hora_venc"],ENT_QUOTES)));//Escanpando caracteres 
                $archiv		 = mysqli_real_escape_string($con,(strip_tags($_POST["archiv"],ENT_QUOTES)));//Escanpando caracteres 
				/*consulta que verifica que no exista otro igual */
                $miConsulta = "select * from ficha where curp ='$curp'"; //crear consulta que seleccione el registro donde el campo codigo sea igual a la variable $codigo
                $cek = mysqli_query($con, $miConsulta);
                /*condicion */
                if(mysqli_num_rows($cek) == 0){
                        /*inserta los valores que estan en los campos de texto */
                        $miConsulta = "INSERT INTO tarea (tarea,instrucciones,materia,grupo,fecha_venc,hora_venc,archiv)
                         VALUES('{$_POST["tarea"]}','{$_POST["instrucciones"]}','{$_POST["materia"]}','{$_POST["grupo"]}','{$_POST["fecha_venc"]}','{$_POST["hora_venc"]}','{$_POST["archiv"]}')"; //crear la consulta del INSERT INTO 
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
            <form action="Asigtarea.php" method="post" class="form">
            <div class="formulario">
            
                <div class="pagina1 active " id="contenido1">
                     <!-- Pagina 1 -->
                    <p  class="encabezado2">Editar tarea</p>
                    <br>
                    <!-- campos del formulario cambiar los que sean necesarios maximo 4 por pagina-->
                    <p>Tarea</p>
                    <input type="text" name="tarea" id="informacion">
                    <p>Instrucciones</p>
                    <input type="text" name="instrucciones" id="informacion">
                    <p>Materia</p>
                    <select name="materia" id="materia" required>
                        <option value="Español">Español</option>
                        <option value="Matematicas">Matematicas</option>
                        <option value="Ciencias naturales">Ciencias naturales</option>
                        <option value="F.C y E">F.C y E</option>
                        <option value="Historia">Historia</option>
                        <option value="Educacion fisica">Educacion fisica</option>
                    </select>
                    <p>Grupo</p>
                    <input type="text" name="grupo" id="informacion">
                      <!--Indica en que pagina se encuentra agregar manualmente -->
                    <p>Pagina 1 de 2</p>
                    
                    <!--boton que cambia de ventana a la siguiente -->
                    <button type="button" class="botonS1" id="boton">Siguiente</button>
                    
                </div>
                 <!-- Pagina 2 -->
                <!--Pagina 3 -->
                <div class="pagina2 "  id="contenido2">
               
                <p  class="encabezado2">Editar tarea</p>
                <br>
                    <p>Fecha de vencimiento</p>
                    <input type="date" name="F_venc" id="informacion">
                    <p>Hora de vencimiento</p>
                    <input type="time" name="H_venc" id="informacion">
                    <p>Adjuntar recursos</p>
                    <input type="file" name="recursos" id="informacion">
                    <br>
                    <br><br><br>
                    <!--Indica en que pagina se encuentra agregar manualmente -->
                    <p>Pagina 2 de 2</p>
                    <!--boton que cambia de ventana a la anterior -->
                    <button type="button" class="botonA1" id="boton">Anterior</button>
                    <!--boton que envia el formulario -->
                    <input type="submit" name="enviar"  value= "Enviar" id="boton" class="botonA2">
                </div>
               
                    
            </div>
            </form>
    </div>
    <script src="../JS/paginacionProfe.js"></script>
</body>
</html>