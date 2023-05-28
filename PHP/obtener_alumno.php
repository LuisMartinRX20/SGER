<?php
include 'conexion.php';

// Consulta SQL para obtener los alumnos que no están en la tabla "lista_grupo"
$sql = "SELECT a.id_alumno, a.noControl, a.nombre
        FROM alumno a
        LEFT JOIN lista_grupo lg ON a.id_alumno = lg.id_alumno
        WHERE lg.id_alumno IS NULL";
$result = $con->query($sql);

// Verificar si se obtuvieron resultados
if ($result->num_rows > 0) {
    $alumnos = array();  

    // Recorrer los resultados y guardar los datos en el array
    while ($row = $result->fetch_assoc()) {
        $alumno = array(
            'id' => $row['id_alumno'],
            'nombre' => $row['nombre'],
            'control' => $row['noControl']
        );

        $alumnos[] = $alumno;
    }

    // Imprimir el array de alumnos
    print_r($alumnos);
} else {
    echo "No se encontraron alumnos que no estén en la tabla lista_grupo.";
}
?>
