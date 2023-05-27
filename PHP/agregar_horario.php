<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Horario de Clases</title>
  <link rel="stylesheet" type="text/css" href="../CSS/horario.css">
</head>
<body>
<?php
        include '../PHP/conexion.php';
        if (isset($_POST['enviar'])) {
            $id_grupo = $_POST["grupo"];
            $n_materias=$_POST["n_materias"];
            $turno=$_POST["turno"];
          
            if($turno=='1'){
                $sql = "INSERT INTO horario (id_horario, id_materia, nombre_materia, hora_inicio, hora_fin, id_grupo)
                    VALUES ('', '$n_materias','Basico', '8:00', '12:30','$id_grupo')";
                if ($con->query($sql) === TRUE) {
                    ?>
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            // Tu código SweetAlert aquí
                            swal({
                                title: "Genial",
                                text: "Se registró un horario con éxito",
                                icon: "success",
                                button: "Listo"
                            }).then(function() {
                                window.location.href = "../PHP/mostrar_horarios.php";
                            });
                        });
                    </script>
                    <?php
                } else {
                    echo $con->error;
                }
            }else{
                $sql = "INSERT INTO horario (id_horario, id_materia, nombre_materia, hora_inicio, hora_fin, id_grupo)
                    VALUES ('', '$n_materias','Basico', '14:00', '18:00','$id_grupo')";
                    if ($con->query($sql) === TRUE) {
                        ?>
                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                // Tu código SweetAlert aquí
                                swal({
                                    title: "Anuma",
                                    text: "Se registró un horario con éxito",
                                    icon: "success",
                                    button: "Listo"
                                }).then(function() {
                                    window.location.href = "../PHP/mostrar_horarios.php";
                                });
                            });
                        </script>
                        <?php
                    } else {
                        ?>
                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                // Tu código SweetAlert aquí
                                swal({
                                    title: "",
                                    text: "No se pudo crear el horario :(",
                                    icon: "error",
                                    button: "Listo"
                                }).then(function() {
                                    window.location.href = "../PHP/agregar_horario.php";
                                });
                            });
                        </script>
                        <?php
                    }
            }
            
        }
        ?>








<div class="vid">
        <form action="../PHP/agregar_horario.php" method="POST">
            <label for="grupo"></label>
            <select id="grupo" name="grupo">
                <option value="">Selecciona Grupo</option>
                <?php 
                include '../PHP/obtener_grupo.php';
                foreach ($grupos as $grupo) { ?>
                    <option value="<?php echo $grupo['id']; ?>">
                        <?php echo $grupo['grado'] . ' ' . $grupo['grupo'] . ' ' . $grupo['profe']; ?>
                    </option>
                <?php } ?>
            </select>
        </div>
        <label for="numeromaterias"></label>
            <select name="n_materias" id="n_materias">
                <option value="6">Minimo materias 6</option>
                <option value="8">Maximo materias 8</option>
            </select>
        <label for="turno"></label>
            <select name="turno" id="turno">
                <option value='2'>Vespertino</option>
                <option value='1'>Matutino</option>
            </select>
    
    <table>
        <tr>
            <th>Hora</th>
            <th>Lunes</th>
            <th>Martes</th>
            <th>Miércoles</th>
            <th>Jueves</th>
            <th>Viernes</th>
        </tr>
        <tr>
            <td>8:00 am - 9:00 am</td>
            <td>Español</td>
            <td>Matemáticas</td>
            <td>Ciencias Naturales</td>
            <td>Geografía</td>
            <td>Historia</td>
        </tr>
        <tr>
            <td>9:00 am - 10:00 am</td>
            <td>Educación Física</td>
            <td>Artes</td>
            <td>Ciencias Naturales</td>
            <td>Geografía</td>
            <td>Español</td>
        </tr>
        <tr class="receso">
            <td>10:00 am - 10:30 am</td>
            <td colspan="5">Receso</td>
        </tr>
        <tr>
            <td>10:30 am - 11:30 am</td>
            <td>Computación</td>
            <td>Español</td>
            <td>Formación Cívica y Ética</td>
            <td>Matemáticas</td>
            <td>Geografía</td>
        </tr>
        <tr>
            <td>11:30 am - 12:30 pm</td>
            <td>Historia</td>
            <td>Matemáticas</td>
            <td>Educación Física</td>
            <td>Artes</td>
            <td>Ciencias Naturales</td>
        </tr>
    </table>

    <input type="submit" name="enviar" value="Enviar" id="boton" class="boton">
</form> 



</body>
</html>
