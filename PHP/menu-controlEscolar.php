<?php session_start(); ?>
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
                    <a href="inicio.php" target="frame" class="nav_link ">Inicio</a>
                </div>
            </li>

            <!-- Elementos con menu desplegable -->

            <!-- Opcion materias-->

            <li class="list_item list_item--click">

                <div class="list_button list_button--click-1" id="materias">
                    <img src="../ICONS/materia.svg" class="list_img">
                    <a href="#" class="nav_link">Materia</a>
                    <img src="../ICONS/submenu.svg" class="list_arrow">
                </div>

                <ul id="m1" class="list_show">
                    <li class="list_inside" id="definir">
                        <a href="agregar_materia.php" target="frame" class="nav_link nav_link--inside">Agregar materia</a>
                    </li>

                    <li class="list_inside">
                        <a href="mostrar_materias.php" target="frame" class="nav_link nav_link--inside">Materias registradas</a>
                    </li>
                </ul>

            </li>

            <!-- Opcion calificaciones -->

            <li class="list_item list_item--click">

                <div class="list_button list_button--click-2" id="materias">
                    <img src="../ICONS/calificacion.svg" class="list_img">
                    <a href="#" class="nav_link">Calificaciones</a>
                    <img src="../ICONS/submenu.svg" class="list_arrow">
                </div>

                <ul id="m2" class="list_show">
                    <li class="list_inside" id="definir">
                        <a href="mostrar_calificaciones.php" target="frame" class="nav_link nav_link--inside">Calificaciones registradas</a>
                    </li>
                </ul>

            </li>

            <!-- Opcion profesores -->

            <li class="list_item list_item--click">

                <div class="list_button list_button--click-3" id="profesores">
                    <img src="../ICONS/usuario.svg" class="list_img">
                    <a href="#" class="nav_link">Profesores</a>
                    <img src="../ICONS/submenu.svg" class="list_arrow">
                </div>

                <ul id="m3" class="list_show">
                    <li class="list_inside" id="definir">
                        <a href="agregar_profesor.php" target="frame" class="nav_link nav_link--inside">Agregar profesor</a>
                    </li>

                    <li class="list_inside">
                        <a href="mostrar_profesores.php" target="frame" class="nav_link nav_link--inside">Profesores registrados</a>
                    </li>
                </ul>

            </li>

            <!-- Opcion inscripcion-->

            <li class="list_item list_item--click">

                <div class="list_button list_button--click-4" id="inscripcion">
                    <img src="../ICONS/inscripcion.svg" class="list_img">
                    <a href="#" class="nav_link">Inscripcion</a>
                    <img src="../ICONS/submenu.svg" class="list_arrow">
                </div>

                <ul id="m4" class="list_show">

                    <li class="list_inside">
                        <a href="mostrar_fichas.php" target="frame" class="nav_link nav_link--inside">Registrar pago</a>
                    </li>
                </ul>

            </li>

            <!-- Opcion alumnos-->

            <li class="list_item list_item--click">

                <div class="list_button list_button--click-5" id="alumno">
                    <img src="../ICONS/alumno.svg" class="list_img">
                    <a href="#" class="nav_link">Alumnos</a>
                    <img src="../ICONS/submenu.svg" class="list_arrow">
                </div>

                <ul id="m5" class="list_show">
                    <li class="list_inside">
                        <a href="../PHP/mostrar_padres.php" target="frame" class="nav_link nav_link--inside">Padres registrados</a>
                    </li>

                    <li class="list_inside">
                        <a href="mostrar_alumno.php" target="frame" class="nav_link nav_link--inside">Alumnos Registrados</a>
                    </li>
                </ul>

            </li>

            <!-- Opcion horarios-->

            <li class="list_item list_item--click">

                <div class="list_button list_button--click-6" id="horario">
                    <img src="../ICONS/horario.svg" class="list_img">
                    <a href="#" class="nav_link">Horarios</a>
                    <img src="../ICONS/submenu.svg" class="list_arrow">
                </div>

                <ul id="m6" class="list_show">
                    <li class="list_inside">
                        <a href="mostrar_horarioM.php" target="frame" class="nav_link nav_link--inside">Crear horario matutino</a>
                    </li>

                    <li class="list_inside">
                        <a href="mostrar_horarioV.php" target="frame" class="nav_link nav_link--inside">Crear horario matutino</a>
                    </li>

                    <li class="list_inside">
                        <a href="mostrar_horarios.php" target="frame" class="nav_link nav_link--inside">Horarios registrados</a>
                    </li>
                </ul>

            </li>

            <!-- Opcion grupos-->

            <li class="list_item list_item--click">

                <div class="list_button list_button--click-7" id="grupos">
                    <img src="../ICONS/grupo.svg" class="list_img">
                    <a href="#" class="nav_link">Grupos</a>
                    <img src="../ICONS/submenu.svg" class="list_arrow">
                </div>

                <ul id="m7" class="list_show">
                    <li class="list_inside">
                        <a href="agregar_grupo.php" target="frame" class="nav_link nav_link--inside">Crear grupo</a>
                    </li>

                    <li class="list_inside">
                        <a href="mostrar_grupos.php" target="frame" class="nav_link nav_link--inside">Grupos registrados</a>
                    </li>

                    <li class="list_inside">
                        <a href="#agregar_grupo.php" target="frame" class="nav_link nav_link--inside">Llenar grupo</a>
                    </li>

                    <li class="list_inside">
                        <a href="mostrar_grupo.php"  target="frame" class="nav_link nav_link--inside">Integrantes de grupos</a>
                    </li>

                </ul>

            </li>

            <!-- Opcion cerrar sesion-->

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
            <a href="#" class="content_header"><?php echo $_SESSION['username'][0];
                                                echo "(" . $_SESSION['username'][1] . ")" ?></a>
        </div>
    </div>

    <div class="contenido">
        <div class="contenido_principal" id="contenido_menu">
            <iframe name="frame" src="inicio.php" frameborder="0" class="fps"></iframe>
        </div>

    </div>
    <script src="../JS/jquery-3.5.1.min.js"></script>
    <script src="../JS/headroom.min.js"></script>
    <script src="../JS/funcion-menu-controlEscolar.js"></script>

</body>

</html>