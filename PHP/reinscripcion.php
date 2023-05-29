<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>interfaz de reinscripcion</title>
    <link rel="stylesheet" href="../CSS/estilos_reins.css">
</head>
<body>
    <div class="reinscripcion_titulo">
 
   

   <style>
        .usuario-info {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: #dadada;
    border: 1px solid #ddd;
    border-radius: 5px;
  }
  
  .usuario-info h2 {
    font-size: 28px;
    margin-bottom: 20px;
    text-align: center;
  }
  
  .usuario-info p {
    font-size: 16px;
    line-height: 1.5;
    margin-bottom: 10px;
  }
  
  .usuario-info strong {
    font-weight: bold;
  }
  
  .usuario-info p:last-child {
    margin-bottom: 0;
  }  
  .usuario-info button[type="submit"] {
    display: block;
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
    text-decoration: none;
  }
  
  .usuario-info button[type="submit"]:hover {
    background-color: #0069d9;
    box-shadow: 0 5px 7px rgba(0,0,0,0.3);
    text-decoration: none;
  }
.usuario{
 width: 15%;
 display: flex;

}
.contenido_principal{
    display: flex;
}
.al{
    text-decoration: none;
}
    </style>

<?php
require('conexion.php');

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$id = 4; // ID del alumno
$estado_nuevo = 1; // Nuevo valor para el campo estado_act

if (isset($_POST['reinscribir'])) {
    $sql = "UPDATE alumno SET estado_act = $estado_nuevo WHERE id_alumno = $id";
    if ($conn->query($sql) === TRUE) {
      echo '<script>alert("La reinscripción se ha realizado correctamente.");</script>';
      echo '<script>window.location.href = "bienvenida.php";</script>';
    } else {
        echo "Error al reinscribir al alumno: " . $conn->error;
    }
}

$sql = "SELECT nombre, apellido_M, apellido_P, noControl, curp, fecha_nac, estado_act FROM alumno WHERE id_alumno = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nombre = $row["nombre"];
    $apellido_paterno = $row["apellido_P"];
    $apellido_materno = $row["apellido_M"];
    $numero_control = $row["noControl"];
    $curp = $row["curp"];
    $fecha_nac = $row["fecha_nac"];
    $estado_act = $row["estado_act"];

} else {
    echo "No se encontró ningún resultado para el ID proporcionado.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interfaz de Reinscripción</title>
    <link rel="stylesheet" href="../CSS/estilos.css">
</head>
<body>
    <div class="reinscripcion_titulo">
        <div class="contenido">
            <div class="contenido_principal" id="contenido_menu">
                <div class="usuario-info">
                    <img src="../Icons/usuario.svg" class="usuario">
                    <h2>Datos de reinscripción</h2>
                    <p><strong>Nombre:</strong> <?php echo $nombre ?></p>
                    <p><strong>Apellido paterno:</strong> <?php echo $apellido_paterno ?></p>
                    <p><strong>Apellido materno:</strong> <?php echo $apellido_materno ?></p>
                    <p><strong>CURP:</strong> <?php echo $curp ?></p>
                    <p><strong>Fecha de nacimiento:</strong> <?php echo $fecha_nac ?></p>
                    <form method="post">
                        <button type="submit" name="reinscribir">Reinscribir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

