<?php session_start()?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGER</title>
    <link rel="stylesheet" href="../CSS/estilos-menu.css">
</head>

<body>
    <nav class="nav">
        <ul class="list">

            <div class="logo_menu">
                <img src="../IMG/logo.jpg" class="img_menu">
            </div>

            <!-- Elementos sin submenu desplegable -->

            <li class="list_item">
                <div class="list_button" id="Inicio">
                    <img src="../ICONS/home.svg" class="list_img">
                    <a href="#" class="nav_link ">Inicio</a>
                </div>
            </li>

            <!-- Elementos con menu desplegable -->

            <li class="list_item list_item--click">

                <div class="list_button list_button--click-1" id="Reinscripcion">
                    <img src="../ICONS/reinscripcion.svg" class="list_img">
                    <a href="#" class="nav_link">Reinscripcion</a>
                    <img src="../ICONS/submenu.svg" class="list_arrow">
                </div>

                <ul id="m1" class="list_show">
                    <li class="list_inside" id="definir">
                        <a href="#" class="nav_link nav_link--inside">Oreden de pago</a>
                    </li>
                </ul>

            </li>

            <li class="list_item list_item--click">

                <div class="list_button list_button--click-2" id="Reinscripcion">
                    <img src="../ICONS/reinscripcion.svg" class="list_img">
                    <a href="#" class="nav_link">Cursando</a>
                    <img src="../ICONS/submenu.svg" class="list_arrow">
                </div>

                <ul id="m2" class="list_show">
                    <li class="list_inside" id="definir">
                        <a href="#" class="nav_link nav_link--inside">Materias</a>
                    </li>

                    <li class="list_inside">
                        <a href="#" class="nav_link nav_link--inside">Horario</a>
                    </li>

                    <li class="list_inside">
                        <a href="#" class="nav_link nav_link--inside">Calificaciones</a>
                    </li>
                </ul>

            </li>

            <li class="list_item list_item--click">

                <div class="list_button list_button--click-3" id="Tareas">
                    <img src="../ICONS/tareas.svg" class="list_img">
                    <a href="#" class="nav_link">Tareas</a>
                    <img src="../ICONS/submenu.svg" class="list_arrow">
                </div>

                <ul id="m3" class="list_show">

                    <li class="list_inside">
                        <a href="#" class="nav_link nav_link--inside">Asignaciones</a>
                    </li>

                    <li class="list_inside">
                        <a href="#" class="nav_link nav_link--inside">Revisadas</a>
                    </li>

                </ul>

            </li>
            <li class="list_item list_item--click">

                <div class="list_button list_button--click-4" id="Mis-datos">
                    <img src="../ICONS/usuario.svg" class="list_img">
                    <a href="#" class="nav_link">Perfil</a>
                    <img src="../ICONS/submenu.svg" class="list_arrow">
                </div>

                <ul id="m4" class="list_show">
                    <li class="list_inside">
                        <a href="#" class="nav_link nav_link--inside">Padre/Tutor</a>
                    </li>

                    <li class="list_inside">
                        <a href="#" class="nav_link nav_link--inside">Alumno</a>
                    </li>

                </ul>

            </li>

            <li class="list_item">
                <div class="list_button">
                    <img src="../ICONS/cerrrar-sesion.svg" class="list_img">
                    <a href="cerrar-sesion.php" class="nav_link ">Cerrar sesion</a>
                </div>
            </li>


        </ul>
    </nav>

    <div class="header">
        <div class="fondo_header">
        <img src="../ICONS/usuario.svg" class="icon_header">
        <a href="#" class="content_header"><?php echo $_SESSION['username'][0]; echo "(".$_SESSION['username'][1].")"?></a>
        </div>
    </div>

    <div class="contenido">
        <div class="contenido_principal" id="contenido_menu">
            
        </div>
        
    </div>
    <script src="../JS/jquery-3.5.1.min.js"></script>
    <script src="../JS/headroom.min.js"></script>
    <script src="../JS/funcion-menu.js"></script>

</body>

</html>