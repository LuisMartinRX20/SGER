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
    <?php
    $sql1 = "SELECT * FROM tarea_entregada";
    $result1 = mysqli_query($con, $sql1);

    $tareasEnv = array();

    if (mysqli_num_rows($result1) > 0) {
        while ($row = mysqli_fetch_assoc($result1)) {
            $tareasEnv[] = $row;
        }
    }
    ?>
<body>
    <div class="grid-cont-rev">
        <div id="infoRev">
            <center>
            <p id="ptitulo">Ejercicios sumas y restas</p>
            <p id="pcuerpo">Matematicas / Grupo 2B Alumno:Carlos Martinez Sosa</p>
            <a href="#" class="editTarea"><div id="tareaRev"><p>Tarea1.pdf</p></div></a>
            </center>
        </div>

        <div id="calif">
            <center>
            <p id="ptitcal">Calificacion:</p>
            <input type="text" name="califT" id="califRev">
            <label id="pCalif">/10</label>
            </center>
        </div>
        <br>
    <center>
        <a href="RevTarea.php" id="btnvolver-rev">
            <input type="button" id="cancel-rev" value="SALIR">
        </a>
</center>
       
    </div>

    <div id="btndiv">
        <div id="flechacompl">
            <a href="#" class="anewflecha">
                <img src="../IMG/flecha.png" id="flecha" alt=""><br>
                Siguiente Alumno
            </a>
        </div>
       

    </div>

</body>

</html>