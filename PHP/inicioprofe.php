<?php

    session_start();
    require 'conexion.php';
   
    
    $RFC = $_SESSION['username'][0];
    $miConsulta = "SELECT nombre,apellido_P,apellido_M FROM profesor WHERE RFC='$RFC'";
    $query = mysqli_query($con,$miConsulta);
    $array = mysqli_fetch_assoc($query);    
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/estilos-inicio.css">
    <title>Document</title>
</head>
<body>
    <div class="contenedor-inicio">

        <div class="mensaje">
            <p>Bienvenido <?php echo $array['nombre'].' '.$array['apellido_P'].' '.$array['apellido_M'];?></p>
        </div>

    </div>
    
</body>
</html>