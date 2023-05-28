<?php
require ('conexion.php');

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$id =1;
$sql = "SELECT id_horario, id_materia, nombre_materia, hora_inicio, hora_fin, id_grupo FROM horario WHERE id_grupo = $id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Horario</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            font-size: 20px;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
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
                    box-shadow: 0 3px 5px rgba(0,0,0,0.2);
                    cursor: pointer;
                    transition: background-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
                  
                }
                  .regresar{
                    text-decoration: none;
                  }
                
    
    </style>
</head>
<body>
    <h1>Horario semanal</h1>
    <table>
        <tr>
           
            <th>Nombre Materia</th>
            <th>Hora de inicio</th>
            <th>Hora de fin</th>
            <th>Dias</th>
           
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["nombre_materia"] . "</td>";
                echo "<td>" . $row["hora_inicio"] . " am"."</td>";
                echo "<td>" . $row["hora_fin"] . " am"."</td>";
                echo "<td> Lun - Vie</td>";
               
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No se encontraron datos de horario.</td></tr>";
        }
        ?>
    </table>
    <div class="Butoon">
                    <div>
                        <a class="regresar" href="../PHP/bienvenida.php"><button type="submit">Regresar</button></a>
                    </div>
                </div>
</body>
</html>

<?php
// Cerrar conexión a la base de datos
$conn->close();
?>
