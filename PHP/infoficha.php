<?php
require('conexion.php');
session_start();
if(!isset($_SESSION['curpA'])){
	header("location:../index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGER: INFO FICHA</title>
    <link href="../CSS/infoficha.css" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
</head>
<body>
    <div class="contenedor">
        <div class="info">
            <?php 
                $curpA=$_SESSION['curpA'];
                $consulta ="select * from ficha where curpA='$curpA'";
                $query=mysqli_query($con,$consulta);
                $row = mysqli_fetch_assoc($query);
                ?>
            <ul>
                <li>No Ficha: <?php echo $row['id_ficha'];?></li>
                <li>Nombre Aspirante:<?php echo $row['nombreA']." ".$row['apellido_PA']." ".$row['apellido_MA'];?></li>
                <li>CURP:<?php echo $row['curpA'];?></li>
                <li>Nombre Padre/Tutor:<?php echo $row['nombreT']." ".$row['apellido_PT']." ".$row['apellido_MT'];?></li>
                <li>Fecha de Pago:</li>
                <li>Precio: <?php echo $row['precio'];?></li>
            </ul>
           <div class="boton">
            <a href="cerrar-sesion.php" class="button">Salir</a>
            </div>
        </div>
    </div>
</body>
</html>