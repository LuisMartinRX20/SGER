<html>
    <head>
        <title>Calificaciones</title>
        <style>
               table {
                border-collapse: collapse;
                width: 100%;
                margin-bottom: 20px;
                }
                th, td {
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
                    box-shadow: 0 3px 5px rgba(0,0,0,0.2);
                    cursor: pointer;
                    transition: background-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
                }
                
                .Butoon button[type="submit"]:hover {
                    background-color: #0069d9;
                    box-shadow: 0 5px 7px rgba(0,0,0,0.3);
                    text-decoration: none; 
                }
                .regresar{
                    text-decoration: none;
                }
                .modificar{
                    text-decoration: none;
                }
                .Butoon{
                    display: flex;
                    margin-left: 75%;
                }
        </style>
    </head>
    <body>
    <?php session_start();

require('conexion.php');
     
$noControl = $_SESSION['username'][2];  
$sql = "SELECT m.nombre, c.calif_P1, c.calif_P2, calif_P3 FROM materia m INNER JOIN calificaciones c ON m.id_materia = c.id_materia";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    ?>

    <div class="contenido">
        <div class="contenido_principal" id="contenido_menu">
            <div class="contenido_principal_header" id="contenido_menu_header">
                <h1>Boletas de calificaciones</h1>
                <table>
                    <tr>
                        <th>Materia</th>
                        <th>1er trimestre</th>
                        <th>2do trimestre</th>
                        <th>3er trimestre</th>
                        <th>Califiación final</th>
                    </tr>
                    <?php
                    while ($row = $result->fetch_assoc()) {
                        $nombre = $row["nombre"];
                        $calificacion1 = $row["calif_P1"];
                        $calificacion2 = $row["calif_P2"];
                        $calificacion3 = $row["calif_P3"];
                        $calificacionf = ($calificacion1 + $calificacion2 + $calificacion3)/3 ;
                        ?>
                        <tr>
                            <td><?php echo $nombre; ?></td>
                            <td><?php echo $calificacion1; ?></td>
                            <td><?php echo $calificacion2; ?></td>
                            <td><?php echo $calificacion3; ?></td>
                            <td><?php echo $calificacionf; ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
                <div class="Butoon">
                    <div>
                        <a class="regresar" href="../PHP/bienvenida.php"><button type="submit">Regresar</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
} else {
    echo "No se encontraron calificaciones en la base de datos.";
}

$con->close();
?>
