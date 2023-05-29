<?php
require('conexion.php');
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../CSS/aviso.css" rel="stylesheet" type="text/css">
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
				$id_grupo		     = mysqli_real_escape_string($con,(strip_tags($_POST["id_grupo"],ENT_QUOTES)));//Escanpando caracteres 
				$descripcion		     = mysqli_real_escape_string($con,(strip_tags($_POST["descripcion"],ENT_QUOTES)));//Escanpando caracteres 
                $id_profe           =$_SESSION['username'][0];
                date_default_timezone_set('America/Mexico_City');

                $fechaActual = date("Y-m-d"); 
                
                
				
               
                
                $miConsulta="INSERT INTO avisos (id,id_grupo,id_profesor,info,f,fecha_aviso) VALUES (NULL, '{$_POST["id_grupo"]}','$id_profe','{$_POST["descripcion"]}','$fechaActual');";
 //crear la consulta del INSERT INTO 
						$insert = mysqli_query($con, $miConsulta) or die(mysqli_error($con));
						if($insert){
                            session_start();
                            $_SESSION['curpA']=$curpA;?>
                            <script>
                            document.addEventListener("DOMContentLoaded", function() {
                            // Tu código SweetAlert aquí
                            Swal.fire({
                                    title:"Ficha registrada",
                                    text: "Mensaje Guardado con EXITO",
                                    icon: "success",
                                    confirmButtonText: "Ok"
                                }).then(function() {
                                window.location.href = "mostrar_aviso.php";
                                });
                            });
                            </script>
                        
						<?php } else{
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudo guardar los datos !</div>';
						}
                    
                    }
            
?>
            
            <form action="crear_aviso.php" method="post" class="form">
            <div class="formulario">
            
                <div class="pagina1 active " id="contenido1">
                    
                    <p  class="encabezado2">Nuevo aviso</p>
                    <p>Grupo</p>

                    <select id="" name="id_grupo" required>
                            <option value="">Seleccionar un Grupo</option>
                            <?php 
                            include 'buscar_grupo.php';
                            foreach ($grupos as $grupo) { ?>
                                <option value="<?php echo $grupo['id']; ?>">
                                <?php echo $grupo['grado'].'°'. $grupo['grupo']; ?></option>
                            <?php } ?>
                        </select>

                    <p>Descripcion del Aviso</p>
                <textarea  type="text" name="descripcion"  class="descripcion" rows="15" cols="61"></textarea>
                    <br>
                    <br>
                 
                    
                    <input type="submit" name="enviar"  value= "Enviar" id="boton">
                    
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
                    <input type="text" name="telefono" id="informacion" required>
                    <p >Calle</p>
                    <input type="text" name="calle" id="informacion" required>
                    <p>No.</p>
                    <input type="text" name="num" id="informacion" required>
                    <p>Colonia</p>
                    <input type="text" name="colonia" id="informacion" required>
                    <p>Codigo Postal</p>
                    <input type="text" name="CP" id="informacion" required>
                    
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