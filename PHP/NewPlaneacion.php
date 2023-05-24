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
				
				/*consulta que verifica que no exista otro igual */
                $miConsulta = "select * from ficha where curp ='$curp'"; //crear consulta que seleccione el registro donde el campo codigo sea igual a la variable $codigo
                $cek = mysqli_query($con, $miConsulta);
                /*condicion */
                if(mysqli_num_rows($cek) == 0){
                        /*inserta los valores que estan en los campos de texto */
                        $miConsulta = "INSERT INTO planeacion (titulo,descripcion)
                         VALUES('{$_POST["tarea"]}','{$_POST["instrucciones"]}')"; //crear la consulta del INSERT INTO 
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
            
                <div class="pagina1 active "  id="contenido1">
               
                <p  class="encabezado2">Nueva planeacion</p>
                <br>
                    <p>Titulo de planeacion </p>
                    <input type="text" name="titulo-p" id="informacion">
                    <p>Descripcion de planeacion </p>
                    <textarea name="descr-p" id="informacion" cols="30" rows="15"></textarea>
                    <br>
                    <br><br><br>
                    <!--Indica en que pagina se encuentra agregar manualmente -->
                    <p>Pagina 1 de 1</p>
                    <!--boton que cambia de ventana a la anterior -->
                    <!--boton que envia el formulario -->
                    <input type="submit" name="enviar"  value= "Enviar" id="boton" class="botonA2">
                </div>
               
                    
            </div>
            </form>
    </div>
    <script src="../JS/paginaficha.js"></script>
</body>
</html>