<?php
require('conexion.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>    
    <link rel="stylesheet" href="../CSS//materia.css">
    <title>Materia</title>
</head>
<body>
    <div class="containe">
           <!-- <?php
			?>-->
        <!-- formulario -->
            <form action="agregar_materia.php" method="POST" class="form">
                <div class="formulario">
                
                        <div class="pagina1 active " id="contenido1">
                            <!-- Pagina 1 -->
                            <p  class="encabezado2">Datos de la Materia</p>
                            <br>
                            <!-- campos del formulario cambiar los que sean necesarios maximo 4 por pagina-->
                            <label for="nombre_materia">Nombre de la Materia:</label>

                            <input type="text" name="nombre_materia" id="informacion" required>
                    
                            <!--Indica en que pagina se encuentra agregar manualmente -->
                            <p>Pagina 1 de 1</p>
                            <input type="submit" name="enviar"  value= "Enviar" id="boton" class="botonA2">
                        </div>
                </div>
            </form>
    </div>

    <?php
            include '../PHP/conexion.php';
            if(isset($_POST['enviar'])){
            $nombre_materia= $_POST["nombre_materia"];

            $sql= "INSERT INTO materia(id_materia, nombre) VALUES ('','$nombre_materia')";

            if ($con->query($sql) === TRUE) {
                ?>
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                        // Tu código SweetAlert aquí
                        swal({
                                title: "",
                                text: "Se Registro una materia con éxito",
                                icon: "success",
                                button: "Listo"
                            }).then(function() {
                                window.location.href = "../PHP/agregar_materia.php";
                            });
                        });
                    </script>
         <?php
        }else{
            ?>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                // Tu código SweetAlert aquí
                swal({
                        title: "",
                        text: "Ocurrio un Error inesperado",
                        icon: "error",
                        button: "Listo"
                    }).then(function() {
                        window.location.href = "../PHP/agregar_materia.php";
                    });
                });
            </script>
        <?php
        }
    }
?>



</body>
</html>