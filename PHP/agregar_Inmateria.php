<?php
include '../PHP/conexion.php';

$nombre_materia= $_POST["nombre_materia"];

$sql= "INSERT INTO materia(id_materia, nombre) VALUES ('','$nombre_materia')";

if ($con->query($sql) === TRUE) {
    ?>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
            // Tu código SweetAlert aquí
            swal({
                    title: "",
                    text: "Se Registro un alumno con éxito",
                    icon: "success",
                    button: "Listo"
                }).then(function() {
                    window.location.href = "../PHP/agregar_materia.php";
                });
            });
        </script>
    <?php
}else{
    die("Error al ingresar registro " . $con->error);
}
?>