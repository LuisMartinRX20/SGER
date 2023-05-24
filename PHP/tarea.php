<?php
function subirTarea($archivo, $directorio)
{
    $nombreArchivo = $archivo['name'];
    $nombreTempArchivo = $archivo['tmp_name'];
    $rutaArchivo = $directorio . '/' . $nombreArchivo;

    // Mover el archivo temporal al directorio destino
    if (move_uploaded_file($nombreTempArchivo, $rutaArchivo)) {
        // El archivo se subió exitosamente
        echo 'Tarea subida correctamente.';
    } else {
        // Ocurrió un error al subir el archivo
        echo 'Error al subir la tarea.';
    }
}

// Ejemplo de uso
if (isset($_FILES['tarea'])) {
    // Directorio donde se almacenarán las tareas subidas
    $directorioDestino = 'ruta/del/directorio';

    // Llamar a la función para subir la tarea
    subirTarea($_FILES['tarea'], $directorioDestino);
}
?>
