<?php session_start();

require('conexion.php');

$id = $_SESSION['username'][0];
$sql = "SELECT nombre, apellido_M, apellido_P FROM alumno WHERE id_padre = $id";
$result = $con->query($sql);


$sql1 = "SELECT tp.id_padre, tf.nombre, tf.apellidoP, tf.apellidoM FROM alumno tp
            INNER JOIN padre tf ON tp.id_padre = tf.id_padre";
    $result1 = $con->query($sql1);

    if ($result1->num_rows > 0) {
    
        $row1 = $result1->fetch_assoc();
        $nombre_padre = $row1["nombre"];
        $apellido_paterno_padre = $row1["apellidoP"];
        $apellido_materno_padre = $row1["apellidoM"];
        
    } else {
        echo "No se encontró ningún resultado para el ID proporcionado.";
    }
    
if ($result->num_rows > 0) {
    
   $row = $result->fetch_assoc();
    $nombre = $row["nombre"];
    $apellido_paterno = $row["apellido_P"];
    $apellido_materno = $row["apellido_M"];
    
} else {
    echo "No se encontró ningún resultado para el ID proporcionado.";
}


$con->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/estilos-inicio.css">
    <title>Mensaje de bienvenida</title>
</head>
<body>
    <div class="contenedor-inicio">
        <div class="mensaje">
            <p>¡Bienvenid@! <?php echo $nombre_padre . " " . $apellido_paterno_padre . " " . $apellido_materno_padre; ?> padre de: <?php echo $nombre . " ". $apellido_paterno. " ". $apellido_materno ?></p>
        </div>
    </div>

</body>
</html>