<?php
require('conexionRodri.php');

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/estilosRodri.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <title>Inicio</title>
</head>

<body>
    <?php
    $sql = "SELECT * FROM tarea";
    $result = mysqli_query($con, $sql);

    $tareas = array();

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $tareas[] = $row;
        }
    }
    ?>
    <div class="grid-cont">
        <div id="tareas">


            <?php
            foreach ($tareas as $tarea) { ?>
                <?php 
                $sql1 = "SELECT nombre FROM materia where id_materia= $tarea[id_materia]";
                $result1 = mysqli_query($con, $sql1);
                $row1 = mysqli_fetch_assoc($result1);
                $materiaNombre = $row1['nombre'];
                
                echo '<a href="editarTarea.php?id=' . $tarea['id_tarea'] . '" class="editTarea">'; ?>
                <div class="tareasAsignadas">
                    <p> <?php echo $tarea['nombre_tarea']; ?> </p>
                    <p><?php echo $materiaNombre.' / Grupo '.$tarea['id_grupo'].' / Fecha de vencimiento: '.$tarea['fecha_limite']?></p>
                    
                </div>
                <br>
                </a>
            <?php } ?>
            <br>
        </div>
        <div id="asignarTareas">
            <a href="nuevaTarea.php">
                <input type="button" id="nuevaTarea" value="NUEVA">
            </a>
        </div>
    </div>
</body>

</html>