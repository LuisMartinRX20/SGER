<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGER</title>
    <link rel="stylesheet" href="../Alumnos/Mostrar.css">
</head>

<body>
    <nav class="nav">
        <ul class="list">

            <div class="logo_menu">
                <img src="../Img/logo.jpeg" class="img_menu">
            </div>

  <!-- Elementos sin submenu desplegable -->
        <!-- Seccion del menu "Inicio" -->
            <li class="list_item">
                <div class="list_button" id="Inicio">
                    <img src="../Icons/inicio.svg" class="list_img">
                    <a href="../Administrador/Admin.php" class="nav_link ">Inicio</a>
                </div>
            </li>
        <!-- Seccion del menu "Alumnos" -->
            <li class="list_item">
                <div class="list_button" id="Alumnos">
                    <img src="../Icons/usuario.svg" class="list_img">
                    <a href="../Alumnos/Adm_Alumnos.php" class="nav_link">Alumnos</a>
                </div>
            </li>
        <!-- Seccion del menu "Maestros" -->
            <li class="list_item">
                <div class="list_button" id="Maestros">
                    <img src="../Icons/usuario.svg" class="list_img">
                    <a href="../Maestros/adm_Maestros.php" class="nav_link">Maestros</a>
                </div>
            </li>
        <!-- Seccion del menu "Boletas" -->
            <li class="list_item">
                <div class="list_button" id="Boletas">
                    <img src="../Icons/boletas.svg" class="list_img">
                    <a href="#" class="nav_link">Boletas</a>
                </div>
            </li>
            <li class="list_item">
                <div class="list_button">
                    <img src="../Icons/cerrarsesion.svg" class="list_img">
                    <a href="#" class="nav_link ">Cerrar sesion</a>
                </div>
            </li>


        </ul>
    </nav>

    <div class="header">
        <div class="fondo_header">
        <img src="../Icons/usuario.svg" class="icon_header">
        <a href="../Adm_MostrarAdmi.php" class="content_header">Administrador</a>
        </div>
    </div>

    <div class="contenido">
        <div class="contenido_principal" id="contenido_menu">
            <div class="usuario-info">
            <img src="../Icons/usuario.svg" class="usuario"> <h2>Información del Alumno</h2>
                <p><strong>Nombre:</strong> Juan</p>
                <p><strong>Apellido paterno:</strong> Pérez</p>
                <p><strong>Apellido materno:</strong> Gómez</p>
                <p><strong>Numero de control:</strong> PERJ901205AA1</p>
                <p><strong>Grupo:</strong> A2</p>
                <p><strong>Grado:</strong>3ro</p>
                <p><strong>Estatus</strong> Activo</p>
                <a class="al" href="../Alumnos/Adm_ModificarAl.php"><button type="submit">Modificar</button></a>
            </div>

            <!--Mostrar datos del padre-->
            <div class="usuario-info">
            <img src="../Icons/usuario.svg" class="usuario"> <h2>Información del Padre</h2>
                <p><strong>Nombre:</strong> Antonio</p>
                <p><strong>Apellido paterno:</strong> Pérez</p>
                <p><strong>Apellido materno:</strong> Castillo</p>
                <p><strong>Telefono:</strong> 4443535</p>
                <p><strong>Dirección:</strong> Antonio lopez del castillo #34</p>
                <a class="al" href="../Alumnos/Adm_ModificarAl.php"><button type="submit">Modificar</button> </a>
            </div>

        </div>
        
    </div>
    <script src="../JS/jquery-3.5.1.min.js"></script>
    <script src="../JS/headroom.min.js"></script>
    <script src="../SG1/Js/fuctionmenu.js"></script>
    <script src="../JS/reload-menu.js"></script>

</body>

</html>