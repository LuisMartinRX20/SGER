<?php
session_start();
require('conexionRodri.php');

?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SGER</title>
  <link rel="stylesheet" href="Style">
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
      box-shadow: 0 3px 5px rgba(0, 0, 0, 0.2);
      cursor: pointer;
      transition: background-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
      text-decoration: none;
    }

    .usuario-info button[type="submit"]:hover {
      background-color: #0069d9;
      box-shadow: 0 5px 7px rgba(0, 0, 0, 0.3);
      text-decoration: none;
    }

    .usuario {
      width: 15%;
      display: flex;

    }

    .contenido_principal {
      display: flex;
    }

    .al {
      text-decoration: none;
    }
  </style>
</head>
<?php

  $RFC=$_SESSION['username'][0];    //aquí se pone el ID del profesor activo en la sesion

  $sql1 = "SELECT * FROM profesor where RFC= '$RFC'";
  $result1 = mysqli_query($con, $sql1);
  $row1 = mysqli_fetch_assoc($result1);
?>

<body>
  <div class="contenido">
    <div class="contenido_principal" id="contenido_menu">
      <div class="usuario-info">
        <img src="../Icons/usuario.svg" class="usuario">
        <h2>Información del Profesor</h2>
        <p><b>Nombre:</b> <?php echo $row1['nombre']; ?></p>
        <p><b>Apellido paterno:</b> <?php echo $row1['apellido_P']; ?></p>
        <p><b>Apellido materno:</b> <?php echo $row1['apellido_M']; ?></p>
        <p><b>RFC:</b> <?php echo $row1['RFC']; ?></p>
        <p><b>Calle:</b> <?php echo $row1['calle']; ?></p>
        <p><b>No.:</b> <?php echo $row1['no']; ?></p>
        <p><b>Colonia:</b> <?php echo $row1['colonia']; ?></p>
        <p><b>Cedula profesional:</b> <?php echo $row1['cedula']; ?></p>
        <p><b>Correo institucional:</b> <?php echo $row1['correo']; ?></p>
      </div>

    </div>

  </div>
</body>

</html>