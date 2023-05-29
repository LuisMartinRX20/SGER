<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/estilos.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <title>Inicio</title>
</head>

<body>

<div class="grid-cont">
<?php
    require('conexion.php');
    $con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    // Consultar los datos de la tabla
    $sql = "SELECT * FROM tarea";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id_tarea = $row['id_tarea'];
            $nombre_tarea = $row['nombre_tarea'];
            $descripion = $row['descripion'];
            $fecha_limite = $row['fecha_limite'];
            $id_profe = $row['id_profe'];
            $id_grupo = $row['id_grupo'];
            $id_materia = $row['id_materia'];
            
            echo '<a href="../PHP/subir_tarea.php">';
            echo '<div id="tareas">';
            echo '<h2>' . $fecha_limite . '</h2>';
            echo '<div class="tareasAsignadas">';
            echo '<p>' . $nombre_tarea . '</p>';
            echo '<p>Vence ' . $fecha_limite . ' / Calificación:  /10/ Descripción: ' . $descripion .'</p>';
            echo '</div>';
            echo '</div>';
            echo '</a>';
            echo '<br>'; // Agregar un salto de línea entre las tareas
        }
    } else {
        echo '<p>No hay tareas disponibles.</p>';
    }

    
    $con->close();
?>
</div>
</body>
</html>
