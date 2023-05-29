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

    <script>
       
    </script>
</head>
<body>
    <div class="fondo">
        
            <?php
			if(isset($_POST['enviar'])){
				$id_grupo		     = mysqli_real_escape_string($con,(strip_tags($_POST["id_grupo"],ENT_QUOTES)));//Escanpando caracteres 
				$descripcion		     = mysqli_real_escape_string($con,(strip_tags($_POST["descripcion"],ENT_QUOTES)));//Escanpando caracteres 
                $id_profe           =$_SESSION['username'][0];
                $profe="SELECT id_profesor FROM profesor where RFC='$id_profe' ";
                $query=mysqli_query($con,$profe);
                $array=mysqli_fetch_assoc($query);
                date_default_timezone_set('America/Mexico_City');

                $fechaActual = date("Y-m-d"); 
                
                
				
               
                
                $miConsulta="INSERT INTO avisos (id,id_grupo,id_profesor,info,fecha_aviso) VALUES (NULL, '{$_POST["id_grupo"]}','$array[id_profesor]','{$_POST["descripcion"]}','$fechaActual');";
 //crear la consulta del INSERT INTO 
						$insert = mysqli_query($con, $miConsulta) or die(mysqli_error($con));
						if($insert){
                          ?>
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
                <textarea  type="text" name="descripcion"  class="descripcion" rows="15" cols="45"></textarea>
                    <br>
                    <br>
                 
                    
                    <input type="submit" name="enviar"  value= "Enviar" id="boton">
                    
                </div>
                             
            </div>
            </form>
    </div>
    <script src="../JS/paginaficha.js"></script>
</body>
</html>