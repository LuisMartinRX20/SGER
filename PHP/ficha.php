<?php
require('conexion.php');

?>
<!DOCTYPE html>
<html lang="en">
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
                    <li class="opcion" id="opcion4">4</li>
                </ul>
                <br>
            </div>  
            <?php
			if(isset($_POST['enviar'])){
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
				
                $miConsulta = "select * from ficha where curp ='$curp'"; //crear consulta que seleccione el registro donde el campo codigo sea igual a la variable $codigo
                $cek = mysqli_query($con, $miConsulta);
                if(mysqli_num_rows($cek) == 0){
                        $miConsulta = "INSERT INTO ficha (Nombre,ApeP,ApeM,curp,fecha_nac,calle,Provincia,Poblacion,CP,nombreT,ApeP_T,ApeM_T,fecha_nac_T,calle_T,provincia_T,Poblacion_T,CP_T,telefono ,precio) VALUES('{$_POST["nombre"]}','{$_POST["ap"]}','{$_POST["apm"]}','{$_POST["curp"]}','{$_POST["fecha_nac"]}','{$_POST["calle"]}','{$_POST["no"]}','{$_POST["colonia"]}','{$_POST["cp"]}','{$_POST["nombreT"]}','{$_POST["apT"]}','{$_POST["apmT"]}','{$_POST["fecha_nacT"]}','{$_POST["calleT"]}','{$_POST["noT"]}','{$_POST["coloniaT"]}','{$_POST["cpT"]}','{$_POST["telT"]}',300)"; //crear la consulta del INSERT INTO 
						$insert = mysqli_query($con, $miConsulta) or die(mysqli_error());
						if($insert){
							echo '<script type="text/javascript">
                            alert("Ficha Guardada");
                            </script>';
                            session_start();
                            $_SESSION['curp']=$curp;
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
                    <input type="text" name="nombre" id="informacion">
                    <p>Apellido Paterno</p>
                    <input type="text" name="ap" id="informacion">
                    <p>Apellido Materno</p>
                    <input type="text" name="apm" id="informacion">
                    <p>Fecha Nacimiento</p>
                    <input type="date" name="fecha_nac" id="informacion">
                    <p>Curp</p>
                    <input type="text" name="curp" id="informacion">
                    <br>
                 
                    <a href="index.php" class="cancelar">Cancelar</a>
                    <button type="button" class="botonS1" id="boton">Siguiente</button>
                    
                </div>
                <div class="pagina2 " id="contenido2">
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
                  
                    <button type="button" class="botonA1" id="boton">Anterior</button>
                    <button type="button" class="botonS2" id="boton">Siguiente</button>
                </div>
                <div class="pagina3 "  id="contenido3">
               
                    <p  class="encabezado3">Datos del Padre/ Tutor</p>
                    <p>Nombre</p>
                    <input type="text" name="nombreT" id="informacion">
                    <p>Apellido Paterno</p>
                    <input type="text" name="apT" id="informacion">
                    <p>Apellido Materno</p>
                    <input type="text" name="apmT" id="informacion">
                    <p>Fecha Nacimiento</p>
                    <input type="date" name="fecha_nacT" id="informacion">
                    <br>
                    <br><br><br><br>
                    
                    <button type="button" class="botonA2" id="boton">Anterior</button>
                    <button  type="button"class="botonS3" id="boton">Siguiente</button>
                </div>
                <div class="pagina4 " id="contenido4">
                
                <p  class="encabezado3">Datos del Padre/ Tutor</p>
                    <p >Calle</p>
                    <input type="text" name="calleT" id="informacion">
                    <p>No.</p>
                    <input type="text" name="noT" id="informacion">
                    <p>Colonia</p>
                    <input type="text" name="coloniaT" id="informacion">
                    <p>Codigo Postal</p>
                    <input type="text" name="cpT" id="informacion">
                    <p>Telefono</p>
                    <input type="text" name="telT" id="informacion">
                    <br>
                    
                    <button type="button" class="botonA3" id="boton">Anterior</button>
                    <input type="submit" name="enviar"  value= "Enviar" id="boton">
                    
                 </div>
                    
            </div>
            </form>
    </div>
    <script src="../JS/paginaficha.js"></script>
</body>
</html>