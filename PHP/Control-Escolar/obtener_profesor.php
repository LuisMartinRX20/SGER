<?php
include 'conexion.php';
// Consulta SQL para obtener los profesores que no están asignados en ningún grupo
$sql = "SELECT id_profesor, nombre
        FROM profesor
        WHERE id_profesor NOT IN (SELECT DISTINCT id_profe FROM grupo)";
$result = $con->query($sql);

// Verificar si se obtuvieron resultados
if ($result->num_rows > 0) {
    $profes = array();  
    // Recorrer los resultados y guardar los datos en el array
    while ($row = $result->fetch_assoc()) {
        $profe = array(
            'id' => $row['id_profesor'],
            'nombre' => $row['nombre']
        );
        $profes[] = $profe;
    }

    // Imprimir el array de profesores
    print_r($profes);
} else {
    echo "No se encontraron profesores sin asignaciones en grupos.";
}
?>
