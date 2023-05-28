<?php
require('conexion.php');

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../CSS/ficha.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <title>SGER:FIcha</title>
</head>
<body>
    <div class="fondo">
        <div class="titulo">
            <h1 id="encabezado">Solicitar Ficha</h1>
                <ul>
                    <li class="opcion active" id="opcion1">1</li>
                    <li class="opcion" id="opcion2">2</li>
                    <li class="opcion" id="opcion3">3</li>
                    <!--<li class="opcion" id="opcion4">4</li>-->
                </ul>
                <br>
            </div>  
            <?php
			if(isset($_POST['enviar'])){
				$nombreA		     = mysqli_real_escape_string($con,(strip_tags($_POST["nombreA"],ENT_QUOTES)));//Escanpando caracteres 
				$apellido_PA		     = mysqli_real_escape_string($con,(strip_tags($_POST["apellido_PA"],ENT_QUOTES)));//Escanpando caracteres 
				$apellido_MA	 = mysqli_real_escape_string($con,(strip_tags($_POST["apellido_MA"],ENT_QUOTES)));//Escanpando caracteres 
                $fecha_nacA	 = mysqli_real_escape_string($con,(strip_tags($_POST["fecha_nacA"],ENT_QUOTES)));//Escanpando caracteres 
				$curpA	 = mysqli_real_escape_string($con,(strip_tags($_POST["curpA"],ENT_QUOTES)));//Escanpando caracteres 
                $nombreT			 = mysqli_real_escape_string($con,(strip_tags($_POST["nombreT"],ENT_QUOTES)));//Escanpando caracteres 
                $apellido_PT			 = mysqli_real_escape_string($con,(strip_tags($_POST["apellido_PT"],ENT_QUOTES)));//Escanpando caracteres 
                $apellido_MT			 = mysqli_real_escape_string($con,(strip_tags($_POST["apellido_MT"],ENT_QUOTES)));//Escanpando caracteres 
                $fecha_nacT			 = mysqli_real_escape_string($con,(strip_tags($_POST["fecha_nacT"],ENT_QUOTES)));//Escanpando caracteres 
                $correo		 = mysqli_real_escape_string($con,(strip_tags($_POST["correo"],ENT_QUOTES)));//Escanpando caracteres 
                $telefono		 = mysqli_real_escape_string($con,(strip_tags($_POST["telefono"],ENT_QUOTES)));//Escanpando caracteres 
                $calle			 = mysqli_real_escape_string($con,(strip_tags($_POST["calle"],ENT_QUOTES)));//Escanpando caracteres 
                $num			 = mysqli_real_escape_string($con,(strip_tags($_POST["num"],ENT_QUOTES)));//Escanpando caracteres 
                $coloniaT		 = mysqli_real_escape_string($con,(strip_tags($_POST["colonia"],ENT_QUOTES)));//Escanpando caracteres 
                $CP		 = mysqli_real_escape_string($con,(strip_tags($_POST["CP"],ENT_QUOTES)));//Escanpando caracteres 
                date_default_timezone_set('America/Mexico_City');

                $fechaActual = date("Y-m-d"); 
                
                
				
                $miConsulta = "select * from ficha where curpA ='$curpA'"; //crear consulta que seleccione el registro donde el campo codigo sea igual a la variable $codigo
                $cek = mysqli_query($con, $miConsulta);
                if(mysqli_num_rows($cek) == 0){
                $miConsulta="INSERT INTO ficha (id_ficha,nombreA,apellido_PA,apellido_MA,fecha_nacA,curpA,nombreT,apellido_PT,apellido_MT,fecha_nacT,correo,telefono,calle,num,colonia,CP,fecha_registro,estado_pago,precio) VALUES (NULL, '{$_POST["nombreA"]}','{$_POST["apellido_PA"]}','{$_POST["apellido_MA"]}','{$_POST["fecha_nacA"]}','{$_POST["curpA"]}','{$_POST["nombreT"]}','{$_POST["apellido_PT"]}','{$_POST["apellido_MT"]}','{$_POST["fecha_nacT"]}','{$_POST["correo"]}','{$_POST["telefono"]}','{$_POST["calle"]}','{$_POST["num"]}','{$_POST["colonia"]}','{$_POST["CP"]}','$fechaActual','0','300');";
 //crear la consulta del INSERT INTO 
						$insert = mysqli_query($con, $miConsulta) or die(mysqli_error($con));
						if($insert){
							echo '<script type="text/javascript">
                            alert("Ficha Guardada");
                            </script>';
                            session_start();
                            $_SESSION['curpA']=$curpA;
                            header("location:infoficha.php");
						}else{
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudo guardar los datos !</div>';
						}
                    }
                else{
                    echo '<script type="text/javascript">
                            alert("Curp ya existe");
                            </script>';
                }
			}
			?>
            
            <form action="ficha.php" method="post" class="form">
            <div class="formulario">
            
                <div class="pagina1 active " id="contenido1">
                    
                    <p  class="encabezado2">Datos del Alumno</p>
                    <p>Nombre</p>
                    <input type="text" name="nombreA" id="informacion">
                    <p>Apellido Paterno</p>
                    <input type="text" name="apellido_PA" id="informacion">
                    <p>Apellido Materno</p>
                    <input type="text" name="apellido_MA" id="informacion">
                    <p>Fecha Nacimiento</p>
                    <input type="date" name="fecha_nacA" id="informacion">
                    <p>Curp</p>
                    <input type="text" name="curpA" id="informacion">
                    <br>
                 
                    <a href="../index.php" id="boton"class="cancelar">Cancelar</a>
                    <button type="button" class="botonS1" id="boton">Siguiente</button>
                    
                </div>
                
                <div class="pagina2 " id="contenido2">
                <p  class="encabezado3">Datos del Padre/ Tutor</p>
                    <p>Nombre</p>
                    <input type="text" name="nombreT" id="informacion">
                    <p>Apellido Paterno</p>
                    <input type="text" name="apellido_PT" id="informacion">
                    <p>Apellido Materno</p>
                    <input type="text" name="apellido_MT" id="informacion">
                    <p>Fecha Nacimiento</p>
                    <input type="date" name="fecha_nacT" id="informacion">
                    <p>Correo</p>
                    <input type="text" name="correo" id="informacion">
                    <br>
                    <!--                        
                <p  class="encabezado2">Datos del Alumno</p>
                    <br>
                    <p >Calle</p>
                    <input type="text" name="calle" id="informacion">
                    <p>No.</p>
                    <input type="text" name="no" id="informacion">
                    <p>Colonia</p>
                    <input type="text" name="colonia" id="informacion">
                    <p>Codigo Postal</p>
                    <input type="text" name="cp" id="informacion">
                    <br>
                    <br>
                    <br>
                  -->
                    <button type="button" class="botonA1" id="boton">Anterior</button>
                    <button type="button" class="botonS2" id="boton">Siguiente</button>
                </div>
                <div class="pagina3 "  id="contenido3">
               
                <p  class="encabezado3">Datos del Padre/ Tutor</p>
                    <p>Telefono</p>
                    <input type="text" name="telefono" id="informacion">
                    <p >Calle</p>
                    <input type="text" name="calle" id="informacion">
                    <p>No.</p>
                    <input type="text" name="num" id="informacion">
                    <p>Colonia</p>
                    <input type="text" name="colonia" id="informacion">
                    <p>Codigo Postal</p>
                    <input type="text" name="CP" id="informacion">
                    
                    <br>
                    
                    <button type="button" class="botonA2" id="boton">Anterior</button>
                    <!--<button  type="button"class="botonS3" id="boton">Siguiente</button>-->
                    <input type="submit" name="enviar"  value= "Enviar" id="boton">
                </div>
                <div class="pagina4 " id="contenido4">
                
                
                    
                    <button type="button" class="botonA3" id="boton">Anterior</button>
                    
                 </div>
                    
            </div>
            </form>
    </div>
    <script src="../JS/paginaficha.js"></script>
</body>
</html>