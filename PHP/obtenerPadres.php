<?php
include 'conexion.php';
// Consulta SQL para obtener los datos de la tabla "padres"
$sql = "SELECT padre_id, nombre_padre FROM padres";
$result = $conn->query($sql);

// Verificar si se obtuvieron resultados
if ($result->num_rows > 0) {
    $padres = array();

    // Recorrer los resultados y guardar los datos en el array
    while ($row = $result->fetch_assoc()) {
        $padre = array(
            'id' => $row['padre_id'],
            'nombre' => $row['nombre_padre']
        );

        $padres[] = $padre;
    }

    /* Imprimir el array de padres
    print_r($padres);
} else {
    echo "No se encontraron datos en la tabla padres.";*/
}


?>