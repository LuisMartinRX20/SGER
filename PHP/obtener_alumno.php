<?php
include 'conexion.php';

// Consulta SQL para obtener los datos de la tabla "grupo"
$sql = "SELECT id_alumno, noControl, nombre FROM alumno";
$result = $con->query($sql);

// Verificar si se obtuvieron resultados
if ($result->num_rows > 0) {
    $alumnos = array();  

    // Recorrer los resultados y guardar los datos en el array
    while ($row = $result->fetch_assoc()) {

        $alumno = array(
            'id' => $row['id_alumno'],
            'nombre' => $row['nombre'],
            'control'=> $row['noControl']
        );

        $alumnos[] = $alumno;
    }

    // Imprimir el array de grupos
//print_r($grupos);
} else {
    echo "No se encontraron datos en la tabla grupo.";
}
?>
