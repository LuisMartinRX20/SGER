<?php
require('conexionRodri.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../CSS/formularioRodri.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <title>SGER:FIcha</title>
</head>
<body>
    <div class="fondo">
            <?php
            $id_tarea = mysqli_real_escape_string($con,(strip_tags($_GET["id"],ENT_QUOTES)));
            $miConsulta = "SELECT * from tarea where id_tarea = $id_tarea"; 
			$sql = mysqli_query($con, $miConsulta);
			if(mysqli_num_rows($sql) == 0){
				header("Location: AsigTarea.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
            /*Variables para obtener el valor de los campos 
            aqui deben poner el nombre de los inputs */
			if(isset($_POST['enviar']) && isset($_FILES['recursos'])){
                
                $rutaArchivoTemporal = $_FILES['recursos']['tmp_name'];
                $archivo= $_FILES["recursos"]["tmp_name"];
                $nombre_archivo= $_FILES["recursos"]["name"];
                $directorio= "../tarea_asignada/";
                /**si se necesitan mas variables copiar y pegar si no borrar las que sobran */
				$tarea = mysqli_real_escape_string($con,(strip_tags($_POST["tarea"],ENT_QUOTES)));//Escanpando caracteres 
                $instrucciones = mysqli_real_escape_string($con,(strip_tags($_POST["instrucciones"],ENT_QUOTES)));//Escanpando caracteres 
                $fecha_venc	= mysqli_real_escape_string($con,(strip_tags($_POST["F_venc"],ENT_QUOTES)));//Escanpando caracteres 
                $id_profe= 1;
				$materia = mysqli_real_escape_string($con,(strip_tags($_POST["materia"],ENT_QUOTES)));//Escanpando caracteres 
                $grupo = mysqli_real_escape_string($con,(strip_tags($_POST["grupo"],ENT_QUOTES)));//Escanpando caracteres 
                


                
				/*consulta que verifica que no exista otro igual */
                $miConsulta = "SELECT * from tarea where id_tarea = $id_tarea"; //crear consulta que seleccione el registro donde el campo codigo sea igual a la variable $codigo
                $cek = mysqli_query($con, $miConsulta);
                /*condicion */
                
                        /*inserta los valores que estan en los campos de texto */
                        $miConsulta = "UPDATE tarea SET nombre_tarea='$tarea', descripcion='$instrucciones', fecha_limite='$fecha_venc',
                         id_profe='$id_profe', id_grupo='$grupo', id_materia='$materia', archivo='$directorio$nombre_archivo' WHERE id_tarea='$id_tarea'"; 
                         /*crear la consulta del UPDATE */
						$insert = mysqli_query($con, $miConsulta) or die(mysqli_error());

                        move_uploaded_file($rutaArchivoTemporal, $directorio.$nombre_archivo);

						if($insert){
                            /**Alerta de se hizo el registro */
							echo '<script type="text/javascript">
                            alert("Tarea modificada");
                            </script>';
						}else{
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudo guardar los datos !</div>';
						}
                   
			}
			?>
        <!-- formulario -->
            <form action="" method="post" class="form" enctype="multipart/form-data">
            <div class="formulario">
            
                <div class="pagina1 active " id="contenido1">
                     <!-- Pagina 1 -->
                    <p class="encabezado2">Editar tarea</p>
                    <br>
                    <!-- campos del formulario cambiar los que sean necesarios maximo 4 por pagina-->
                    <p>Tarea</p>
                    <input type="text" name="tarea" id="informacion" value="<?php echo $row['nombre_tarea'];?>">
                    <p>Instrucciones</p>
                    <input type="text" name="instrucciones" id="informacion" value="<?php echo $row['descripcion'];?>">
                    <p>Materia</p>
                    <select name="materia" id="materia" value="<?php echo $row['id_materia'];?>" required>
                        <option value="1">Español</option>
                        <option value="2">Matematicas</option>
                        <option value="3">Ciencias naturales</option>
                        <option value="4">F.C y E</option>
                        <option value="5">Historia</option>
                        <option value="6">Educacion fisica</option>
                    </select>
                    <p>ID del Grupo</p>
                    <input type="text" name="grupo" value="<?php echo $row['id_grupo'];?>" id="informacion">
                      <!--Indica en que pagina se encuentra agregar manualmente -->
                    <p>Pagina 1 de 2</p>
                    
                    <!--boton que cambia de ventana a la siguiente -->
                    <button type="button" class="botonS1" id="boton">Siguiente</button>
                    
                </div>
                 <!-- Pagina 2 -->
                <div class="pagina2 "  id="contenido2">
               
                <p  class="encabezado2">Nueva tarea</p>
                <br>
                    <p>Fecha de vencimiento</p>
                    <input type="datetime-local" name="F_venc" value="<?php echo $row['fecha_limite'];?>" id="informacion">
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