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
   
        <!-- formulario -->
    
            <div class="formulario">
            
                <div class="pagina1 active " id="contenido1">
                     <!-- Pagina 1 -->
                    <p  class="encabezado2">Datos de tu tarea</p>
                    <br>
                    <!-- campos del formulario cambiar los que sean necesarios maximo 4 por pagina-->
                    <p>Nombre del alumno</p>
                    <!-- input donde se obtienen datos cambiar el nombre("name") ah el nombre del campo
                        que se esta menejando y ponerlos en las variables de arria -->
                    <input type="text" name="nombre" id="informacion"> 
                    <!--boton que envia el formulario -->
                    <input type="submit" name="adjuntar"  value= "Adjuntar archivos" id="boton" class="botonA3">
                    <input type="submit" name="enviar"  value= "Enviar" id="boton" class="botonA2">
              
                </div>
                
                </div>
               
                    
            </div>
            </form>
    </div>
</body>
</html>