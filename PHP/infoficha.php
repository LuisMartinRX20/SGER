<?php
require('conexion.php');
session_start();
if(!isset($_SESSION['curp'])){
	header("location: index.php");
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
                $curp=$_SESSION['curp'];
                $consulta ="select * from ficha where curp='$curp'";
                $query=mysqli_query($con,$consulta);
                $row = mysqli_fetch_assoc($query);
                ?>
            <ul>
                <li>No Ficha: <?php echo $row['ficha_id'];?></li>
                <li>Nombre Aspirante:<?php echo $row['Nombre']." ".$row['ApeP']." ".$row['ApeM'];?></li>
                <li>CURP:<?php echo $row['curp'];?></li>
                <li>Nombre Padre/Tutor:<?php echo $row['nombreT']." ".$row['ApeP_T']." ".$row['ApeM_T'];?></li>
                <li>Fecha de Pago:</li>
                <li>Precio:$300.00</li>
            </ul>
           <div class="boton">
            <a href="cerrarsesion.php" class="button">Salir</a>
            </div>
        </div>
    </div>
</body>
</html>