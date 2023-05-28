<?php
include 'conexion.php';

// Consulta SQL para obtener los grupos que no están en la tabla "horario"
$sql = "SELECT g.id_grupo, g.grado, g.grupo, p.nombre AS nombre_profesor
        FROM grupo g
        LEFT JOIN profesor p ON g.id_profe = p.id_profesor
        WHERE g.id_profe IS NOT NULL
        AND g.id_grupo NOT IN (SELECT DISTINCT id_grupo FROM horario)";
$result = $con->query($sql);

// Verificar si se obtuvieron resultados
if ($result->num_rows > 0) {
    $grupos = array();  

    // Recorrer los resultados y guardar los datos en el array
    while ($row = $result->fetch_assoc()) {
        $grupo = array(
            'id' => $row['id_grupo'],
            'grado' => $row['grado'],
            'grupo' => $row['grupo'],
            'profe' => $row['nombre_profesor']
        );

        $grupos[] = $grupo;
    }

    // Imprimir el array de grupos
    print_r($grupos);
} else {
    echo "No se encontraron grupos con profesores asignados que no estén en la tabla horario.";
}
?>
