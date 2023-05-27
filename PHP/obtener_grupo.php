<?php
include 'conexion.php';

// Consulta SQL para obtener los datos de la tabla "grupo"
$sql = "SELECT id_grupo, grado, grupo, id_profe FROM grupo";
$result = $con->query($sql);

// Verificar si se obtuvieron resultados
if ($result->num_rows > 0) {
    $grupos = array();  

    // Recorrer los resultados y guardar los datos en el array
    while ($row = $result->fetch_assoc()) {
        $idProfesor = $row['id_profe'];

        // Consulta SQL para obtener el nombre del profesor por su ID
        $sqlProfesor = "SELECT nombre FROM profesor WHERE id_profesor = '$idProfesor'";
        $resultProfesor = $con->query($sqlProfesor);

        if ($resultProfesor->num_rows > 0) {
            $rowProfesor = $resultProfesor->fetch_assoc();
            $nombreProfesor = $rowProfesor['nombre'];
        } else {
            $nombreProfesor = "Desconocido";
        }

        $grupo = array(
            'id' => $row['id_grupo'],
            'grado' => $row['grado'],
            'grupo' => $row['grupo'],
            'profe' => $nombreProfesor
        );

        $grupos[] = $grupo;
    }

    // Imprimir el array de grupos
    print_r($grupos);
} else {
    echo "No se encontraron datos en la tabla grupo.";
}
?>
