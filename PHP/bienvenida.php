<?php
require('conexion.php');

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$id = 4;
$sql = "SELECT nombre, apellido_M, apellido_P FROM alumno WHERE id_alumno = $id";
$result = $conn->query($sql);

$sql1 = "SELECT tp.id_padre, tf.nombre, tf.apellidoP, tf.apellidoM FROM alumno tp
            INNER JOIN padre tf ON tp.id_padre = tf.id_padre";
    $result1 = $conn->query($sql1);

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


$conn->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensaje de bienvenida</title>
    <link rel="stylesheet" href="../CSS/estilos.css">
</head>
<body>
    <div class="cuadro">
    <div class="container">
<h1>¡Bienvenido <span style="color: #19A8CE;"><?php echo $nombre_padre . " " . $apellido_paterno_padre . " " . $apellido_materno_padre; ?></span> padre de: <h1 class="bienvenida_hijo"><?php echo $nombre . " ". $apellido_paterno. " ". $apellido_materno ?></h1></h1>
    </div>
    </div>

</body>
</html>