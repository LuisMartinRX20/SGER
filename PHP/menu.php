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

            <!-- Elementos sin submenu desplegable -->

            <li class="list_item">
                <div class="list_button">
                    <img src="../ICONS/home.svg" class="list_img">
                    <a href="#" class="nav_link ">Inicio</a>
                </div>
            </li>

            <li class="list_item">
                <div class="list_button">
                    <img src="../ICONS/cursando.svg" class="list_img">
                    <a href="#" class="nav_link">En curso</a>
                </div>
            </li>

            <li class="list_item">
                <div class="list_button">
                    <img src="../ICONS/boletas.svg" class="list_img">
                    <a href="#" class="nav_link">Boletas</a>
                </div>
            </li>

            <!-- Elementos con menu desplegable -->

            <li class="list_item list_item--click">

                <div class="list_button list_button--click">
                    <img src="../ICONS/reinscripcion.svg" class="list_img">
                    <a href="#" class="nav_link">Reinscripcion</a>
                    <img src="../ICONS/submenu.svg" class="list_arrow">
                </div>

                <ul class="list_show">
                    <li class="list_inside">
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

            <li class="list_item list_item--click">

                <div class="list_button list_button--click">
                    <img src="../ICONS/tareas.svg" class="list_img">
                    <a href="#" class="nav_link">Tareas</a>
                    <img src="../ICONS/submenu.svg" class="list_arrow">
                </div>

                <ul class="list_show">
                    <li class="list_inside">
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
            <li class="list_item list_item--click">

                <div class="list_button list_button--click">
                    <img src="../ICONS/usuario.svg" class="list_img">
                    <a href="#" class="nav_link">Mis datos</a>
                    <img src="../ICONS/submenu.svg" class="list_arrow">
                </div>

                <ul class="list_show">
                    <li class="list_inside">
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

        
        </ul>
    </nav>

</body>

    <script src="../JS/funcion-menu.js"></script>

</html>