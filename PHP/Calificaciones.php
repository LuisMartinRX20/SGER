<?php
require('conexionRodri.php');

?>
<html>

<head>
    <title>Calificaciones</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        h1 {
            text-align: center;
            margin-top: 50px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .Butoon button[type="submit"] {
            display: flex;
            margin-left: 50%;
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            box-shadow: 0 3px 5px rgba(0, 0, 0, 0.2);
            cursor: pointer;
            transition: background-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }

        .Butoon button[type="submit"]:hover {
            background-color: #0069d9;
            box-shadow: 0 5px 7px rgba(0, 0, 0, 0.3);
            text-decoration: none;
        }

        .regresar {
            text-decoration: none;
        }

        .modificar {
            text-decoration: none;
        }

        .Butoon {
            display: flex;
            margin-left: 75%;
        }

        #CalifInput {
            width: 50px;
        }
    </style>
</head>
<?php
$sql = "SELECT * FROM tarea_entregada";
$result = mysqli_query($con, $sql);

$tareas = array();

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $tareas[] = $row;
    }
}
?>

<body>
<?php
            /*Variables para obtener el valor de los campos 
            aqui deben poner el nombre de los inputs */
			if(isset($_POST['enviar'])){
                /**si se necesitan mas variables copiar y pegar si no borrar las que sobran */
                $id_tarea = mysqli_real_escape_string($con,(strip_tags($_GET["id_tarea"],ENT_QUOTES)));
                $id_alumno = mysqli_real_escape_string($con,(strip_tags($_GET["id_alumno"],ENT_QUOTES)));
				$calific = mysqli_real_escape_string($con,(strip_tags($_POST["calific"],ENT_QUOTES)));//Escanpando caracteres 

                


                
				/*consulta que verifica que no exista otro igual */
            
                /*condicion */
                
                        /*inserta los valores que estan en los campos de texto */
                        $miConsulta = "UPDATE tarea_entregada SET calificacion='$calific', estado_entregada=1 WHERE (id_tarea='$id_tarea') 
                        AND (id_alumno='$id_alumno') "; 
                         /*crear la consulta del UPDATE */
						$insert = mysqli_query($con, $miConsulta) or die(mysqli_error());


						if($insert){
                            /**Alerta de se hizo el registro */
							echo '<script type="text/javascript">
                            alert("calificacion modificada");
                            </script>';
                            header("Location: Calificaciones.php");
						}else{
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudo guardar los datos !</div>';
						}
			}
			?>
    <div class="contenido">
        <div class="contenido_principal" id="contenido_menu">
            <div class="contenido_principal_header" id="contenido_menu_header">
                <h1>Tareas Entregadas</h1>
                <table>
                    <tr>
                        <th>id_tarea</th>
                        <th>Id_alumno</th>
                        <th>archivo</th>
                        <th>fecha_entregada</th>
                        <th>calificacion</th>
                        <th>Estado_entregada</th>
                    </tr>
                    <?php
                    foreach ($tareas as $tarea) { ?>
                        <tr>
                            <td>

                                <?php
                                $sql1 = "SELECT nombre_tarea FROM tarea where id_tarea= $tarea[id_tarea]";
                                $result1 = mysqli_query($con, $sql1);
                                $row1 = mysqli_fetch_assoc($result1);
                                $tareaNombre = $row1['nombre_tarea'];
                                echo $tareaNombre; ?>
                            </td>
                            <td>
                                <?php
                                $sql2 = "SELECT nombre FROM alumno where id_alumno= $tarea[id_alumno]";
                                $result2 = mysqli_query($con, $sql2);
                                $row2 = mysqli_fetch_assoc($result2);
                                $alumnoNombre = $row2['nombre'];
                                echo $alumnoNombre; ?>
                            </td>
                            <td>
                                <?php echo $tarea['archivo']; ?>
                            </td>
                            <td>
                                <?php echo $tarea['fecha_entregada']; ?>
                            </td>
                            <td>
                                <form action="Calificaciones.php?id_tarea=<?php echo $tarea['id_tarea']; ?>&id_alumno=<?php echo $tarea['id_alumno']; ?>" method="post">
                                    <input type="text" name="calific" id="CalifInput" value="<?php echo $tarea['calificacion']; ?>">
                                        <input type="submit" value="enviar" name="enviar">
                                </form>
                            </td>
                            <td>
                                <?php echo $tarea['estado_entregada']; ?>
                            </td>

                        <?php } ?>
                    
                </table>
                
</body>

</html>