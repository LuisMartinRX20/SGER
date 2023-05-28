<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../CSS/mostrar_tablaG.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Lista de Profesores</title>
</head>

<body>
    <div class="container">
        <div>
            <h2 class="h2">Lista de Grupos</h2>
            <hr />

            <?php
            include 'conexion.php';
            // VALOR aksi es para borrar aquí está la función borrar
            if (isset($_GET['aksi']) == 'delete') {
                // escaping, additionally removing everything that could be (html/javascript-) code
                $nik = mysqli_real_escape_string($con, (strip_tags($_GET["nik"], ENT_QUOTES)));
                $miConsulta = "select * from lista_grupo where id_alumno='$nik'"; //buscar el empleado que tenga en el campo codigo lo que hay en la variable $nik para ser eliminado
                $cek = mysqli_query($con, $miConsulta);
                if (mysqli_num_rows($cek) == 0) {
                    ?>
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            // Tu código SweetAlert aquí
                            swal({
                                title: "¿Ah caray?",
                                text: "No se encontraron datos",
                                icon: "info",
                                button: "Listo"
                            }).then(function() {
                                window.location.href = "../PHP/mostrar_lista.php";
                            });
                        });
                    </script>
                <?php
                } else {
                    $delete = mysqli_query($con, "DELETE FROM lista_grupo WHERE id_alumno='$nik'");
                    if ($delete) {
                ?>
                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                // Tu código SweetAlert aquí
                                swal({
                                    title: "",
                                    text: "Se eliminó al Alumno del grupo de forma correcta",
                                    icon: "success",
                                    button: "Listo"
                                }).then(function() {
                                    window.location.href = "../PHP/mostrar_lista.php";
                                });
                            });
                        </script>
                    <?php
                    } else {
                    ?>
                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                // Tu código SweetAlert aquí $filter = (isset($_GET['filter']) ? $_GET['filter'] : 0); 
                                swal({
                                    title: "¿Ah caray?",
                                    text: "No se pudo eliminar el Grupo",
                                    icon: "error",
                                    button: "Listo"
                                }).then(function() {
                                    window.location.href = "../PHP/mostrar_lista.php";
                                });
                            });
                        </script>
            <?php
                    }
                }
            }/*foreach ($grupos as $grupo) {
                $selected = ($filter == $grupo['id']) ? 'selected' : '';
                echo '<option value="' . $grupo['id'] . '" ' . $selected . '>' . $grupo['grado'] . ' ' . $grupo['grupo'] . '</option>';
            }*/
            ?>

<form method="get">
    <div class="form-group">
        <select id="grupo" name="filter">
            <option value="">Selecciona Grupo</option>
            <?php 
            include '../PHP/obtener_grupo.php';
            $filter = (isset($_GET['filter']) ? $_GET['filter'] : 0); 
            foreach ($grupos as $grupo) { ?>
                <option value="<?php echo $grupo['id']; ?>" <?php if ($filter == $grupo['id']) echo 'selected'; ?>>
                    <?php echo $grupo['id']; ?>
                </option>
            <?php } ?>
        </select>
        <button type="submit">Filtrar</button>
    </div>
</form>

<div class="g">
    <table class="table">
        <!-- Aquí se agregan los campos que van a mostrar en la tabla, solo los títulos -->
        <tr>
            <th>ID Grupo</th>
            <th>ID Alumno</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Acciones</th>
        </tr>
        <?php
        if ($filter) {
            if ($filter == '1' || $filter == '2' || $filter == '3' || $filter == '4' || $filter == '5' || $filter == '6'
           || $filter == '7' || $filter == '8' || $filter == '9' || $filter == '10' || $filter == '11' || $filter == '12'
           || $filter == '13' || $filter == '14' || $filter == '15' || $filter == '16' || $filter == '17' || $filter == '18'
            ) {
                $miConsulta = "SELECT lg.id_grupo, lg.id_alumno, a.nombre, a.apellido_P, a.apellido_M FROM lista_grupo lg INNER JOIN alumno a ON lg.id_alumno = a.id_alumno WHERE lg.id_grupo = '$filter'"; // Consulta con filtro por ID del grupo
            }
            $sql = mysqli_query($con, $miConsulta);
        } else {
            $miConsulta = "SELECT lg.id_grupo, lg.id_alumno, a.nombre, a.apellido_P, a.apellido_M FROM lista_grupo lg INNER JOIN alumno a ON lg.id_alumno = a.id_alumno";
            $sql = mysqli_query($con, $miConsulta);
        }
        // Resto del código para mostrar los resultados de la consulta

                    if (mysqli_num_rows($sql) == 0) {
                        echo '<tr><td colspan="6">No se encontraron datos.</td></tr>';
                    } else {
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($sql)) {
                            echo '<tr>
                                <td>' . $row['id_grupo'] . '</td>
                                <td>' . $row['id_alumno'] . '</td>
                                <td>' . $row['nombre'] . '</td>
                                <td>' . $row['apellido_P'] . '</td>
                                <td>' . $row['apellido_M'] . '</td>
                                <td> 
                                    <a href="../PHP/mostrar_lista.php?aksi=delete&nik=' . $row['id_alumno'] . '" name="aksi"><i class="bi bi-trash">Borrar</i></a>
                                </td>
                            </tr>';
                            $no++;
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
