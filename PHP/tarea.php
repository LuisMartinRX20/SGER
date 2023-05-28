<?php
require('conexion.php');
$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
// Verificar si se ha enviado un archivo
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $directorio_destino = 'archivos/';

    // Obtener los datos del archivo
    $nombre_archivo = $_FILES['archivo']['name'];
    $ruta_archivo_temporal = $_FILES['archivo']['tmp_name'];
    $ruta_destino = $directorio_destino . $nombre_archivo;

    // Obtener otros datos del formulario
    $id_alumno = 4; // Suponiendo que el ID del alumno se envía mediante un campo oculto en el formulario

    // Mover el archivo a la ruta de destino
    if (move_uploaded_file($ruta_archivo_temporal, $ruta_destino))  {
        // Archivo subido exitosamente, guardar los datos en la base de datos
        $fecha_entregada = date('Y-m-d'); // Obtener la fecha actual
        $calificacion = null; // Por defecto, la calificación es nula
        $estado_entregada = 1; // Estado de entrega: 0 = no entregada, 1 = entregada

        // Insertar los datos en la tabla de tareas
        $sql = "INSERT INTO tarea_entregada (id_tarea, id_alumno, archivo, fecha_entregada, calificacion, estado_entregada) 
                VALUES ('1', '$id_alumno', '$nombre_archivo', '$fecha_entregada', '$calificacion', '$estado_entregada')";

        if ($con->query($sql) === TRUE) {
            echo '<script>alert("Tarea subida con éxito.");</script>';
      echo '<script>window.location.href = "bienvenida.php";</script>';
            echo "Tarea guardada exitosamente.";
        } else {
            // Error al guardar la tarea
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    } else {
        // Error al mover el archivo
        echo "Error al subir el archivo.";
    }

    $con->close();
} else {
    // No se ha enviado ningún archivo
    echo "No se ha seleccionado ningún archivo.";
}
?>
