<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGER</title>
    <link rel="stylesheet" href="../Administrador/admin.css">
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
                    <a href="../administrador/Admin.php" class="nav_link ">Inicio</a>
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

            <!-- Elementos con menu desplegable 

            <li class="list_item list_item--click">

                <div class="list_button list_button--click-1" id="Boletas">
                    <img src="../ICONS/reinscripcion.svg" class="list_img">
                    <a href="#" class="nav_link">Boletas</a>
                    <img src="../ICONS/submenu.svg" class="list_arrow">
                </div>

                <ul id="m1" class="list_show">
                    <li class="list_inside" id="definir">
                        <a href="#" class="nav_link nav_link--inside">Definir</a>
                    </li>

                    <li class="list_inside">
                        <a href="#" class="nav_link nav_link--inside">Definir</a>
                    </li>

                    <li class="list_inside">
                        <a href="#" class="nav_link nav_link--inside">Definir</a>
                    </li>
                </ul>

            </li>
            -->
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
        <h2 >Proximamente Anuncios si que si </h2>
        </div>
        
    </div>
    <script src="../JS/jquery-3.5.1.min.js"></script>
    <script src="../JS/headroom.min.js"></script>
    <script src="../SG1/Js/fuctionmenu.js"></script>
    <script src="../JS/reload-menu.js"></script>
script>

</body>

</html>