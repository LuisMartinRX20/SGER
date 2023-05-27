<?php
require('conexion.php');
session_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGER: INFO FICHA</title>
    <link href="../CSS/pago.css" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
</head>
<body>
    <div class="buscador">
    
            <form action="pago.php" method="post" class="buscarficha">
                <p class="noficha">NO FICHA</p>
                <input type="text" class="noficha" name="noficha">
                <input type="submit" value="Buscar" class="noficha" >
            </form>
    </div>
    <div class="contenedor">
        <div class="info">
            
            <?php 
if (!empty($_POST['noficha'])) {
    $noficha = $_POST['noficha'];
    $buscarficha="select count(*) as contar from ficha where id_ficha='$noficha' and estado_pago='0'";
    $consulta=mysqli_query($con,$buscarficha);
    $arreglo=mysqli_fetch_array($consulta);
    if($arreglo['contar']>0){
                $consulta ="select * from ficha where id_ficha='$noficha' ";
                $query=mysqli_query($con,$consulta);
                $row = mysqli_fetch_assoc($query);
                echo '

                <ul>
                <li>No Ficha:'.$row['id_ficha'].'</li>
                <li>Nombre Aspirante:'.$row['nombreA'].' '.$row['apellido_PA'].' '.$row['apellido_MA'].'</li>
                <li>CURP:'.$row['curpA'].'</li>
                <li>Nombre Padre/Tutor:'.$row['nombreT'].' '.$row['apellido_PT'].' '.$row['apellido_MT'].'</li>
                <li>Fecha de Pago:</li>
                <li>Precio:'.$row['precio'].'</li>
                </ul>
                <div class="boton">
                <a href="registrarpago.php?nik='.$row['id_ficha'].'" id="button">Pagar</a>   
                </div>
                ';
                $aux=$row;         
    }
    else{
        echo 'Ficha ya fue pagada o No existe';
    }
}         
?>
            
            
    </div>
</body>
</html>