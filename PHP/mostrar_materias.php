
<!DOCTYPE html>
<html lang="es">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../CSS/mostrar_tablaG.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

	<title>Lista de Profesores</title>

</head>
<body>
    <div class="container">
        <div>
            <h2 class="h2">Lista de Materias</h2>
            <hr />

			<?php
				// VALOR aksi es para borrar aqui esta la funcion borrar
				if(isset($_GET['aksi']) == 'delete'){
					// escaping, additionally removing everything that could be (html/javascript-) code
					$nik = mysqli_real_escape_string($con,(strip_tags($_GET["nik"],ENT_QUOTES)));
					$miConsulta = "select * from materias where id_materia='$nik'"; //buscar el empleado que tenga en el campo codigo lo que hay en la variable $nik para ser eliminado
					$cek = mysqli_query($con,$miConsulta);
					if(mysqli_num_rows($cek) == 0){
						echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No se encontraron datos.</div>';
					}else{
						$delete = mysqli_query($con, "DELETE FROM materia WHERE id_materia='$nik'");
						if($delete){
							echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Datos eliminado correctamente.</div>';
						}else{
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, no se pudo eliminar los datos.</div>';
						}
					}
				}
			?>







            <form method="GET">
                <div class="form-group">
                    <select name="filter" class="form-control" onchange="form.submit()">
                        <option value="0">Filtros de datos por</option>
                        <!--Estos son los campos que deben modificar si desean aplicar filtros-->
                        <?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL);  ?>
                        <option value="1" <?php if($filter == 'Tetap'){ echo 'selected'; } ?>>nombre</option>
                    </select>
                </div>
            </form>
            <br />

            <div class="g">
            <table class="table">
                <!--Aqui se agregan los campos que van a mostrar en la tabla los titulos solamente-->
                <tr>
                    <th>ID materia</th>
                    <th>Nombre de la materia</th>
                    <th>Acciones</th>
                </tr>
                <?php
                include '../PHP/conexion.php';

                $sql = "SELECT * FROM materia";
                $result = mysqli_query($con, $sql);

                if (mysqli_num_rows($result) == 0) {
                    echo '<tr><td colspan="3">No se encontraron datos.</td></tr>';
                } else {
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>
                                <td>'.$row['id_materia'].'</td>
                                <td>'.$row['nombre'].'</td>
                                <td>
								<a href="../PHP/editar_materia.php?nik='.$row['id_materia'].'"><i class="bi bi-clipboard">Editar</i></a>
								<a href="#?nik='.$row['id_materia'].'" name="aksi"><i class="bi bi-trash">Borrar</a></i>
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</body>
</html>