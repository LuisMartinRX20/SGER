<?php
include 'conexion.php';
// Consulta SQL para obtener los datos de la tabla "padres"
$sql = "SELECT id_grupo,grado,grupo FROM grupo";
$result = $con->query($sql);

// Verificar si se obtuvieron resultados
if ($result->num_rows > 0) {
    $grupos = array();  

    // Recorrer los resultados y guardar los datos en el array
    while ($row = $result->fetch_assoc()) {
        $grupo = array(
            'id' => $row['id_grupo'],
            'grado' => $row['grado'],
            'grupo'=>$row['grupo']
        );

        $grupos[] = $grupo;
    }

    
    print_r($grupo);
} else {
    echo "No se encontraron datos en la tabla padres.";
}


?>