<?php
require 'conexion.php';
// Consulta SQL para obtener los datos de la tabla "padres"
$sql = "SELECT id_profesor,nombre FROM profesor";
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
        var_dump($profe);
    }
   

    /* Imprimir el array de padres
    print_r($padres);
} else {
    echo "No se encontraron datos en la tabla padres.";*/
}


?>