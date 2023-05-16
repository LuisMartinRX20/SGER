<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGER</title>
    <link rel="stylesheet" href="../Alumnos/Modificiar.css">
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
   <!---Aqui empieza el Contenido General No incluyendo los botones --->
    <div class="contenido">
        <div class="contenido_principal" id="contenido_menu">
        <h2 >Aquí va el nombre del alumno </h2>

        </div>

     <!--Div contenedor de los froms-->
    <div class="ContenedorFroms">
       <div class="alumno-form">
        <h2>Modificar datos de alumno</h2>
    <form action="guardar-alumno.php" method="POST">
        <!---Parte del nombre del alumno--->
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
        <!---Parte del ApellidoPaterno del alumno--->
            <div class="form-group">
                <label for="apellido-paterno">Apellido Paterno:</label>
                <input type="text" id="apellido-paterno" name="apellido_paterno" required>
            </div>
        <!---Parte del ApellidoMaterno del alumno--->
            <div class="form-group">
                <label for="apellido-materno">Apellido Materno:</label>
                <input type="text" id="apellido-materno" name="apellido_materno" required>
            </div>
        <!---Parte del numero de control del alumno--->
            <div class="form-group">
                <label for="numero-control">Número de Control:</label>
                <input type="text" id="numero-control" name="numero_control" required>
            </div>
        <!---Parte del Grupo del alumno--->
            <div class="form-group">
                <label for="grupo">Grupo:</label>
                <input type="text" id="grupo" name="grupo" required>
            </div>
        <!---Parte del Grado del alumno--->
            <div class="form-group">
                <label for="grado">Grado:</label>
                <input type="text" id="grado" name="grado" required>
            </div>
        <!---Parte del Estatus del alumno--->
            <div class="form-group">
                <label for="estatus">Estatus:</label>
                    <select id="estatus" name="estatus" required>
                        <option value="">Selecciona una opción</option>
                        <option value="Activo">Activo</option>
                        <option value="Inactivo">Inactivo</option>
                    </select>
            </div>
            <button type="submit">Guardar cambios</button>
        </form>
        </div>

            <!---Aquí empieza el formulario de datos del padre -->
    <div class="alumno-form">
        <h2>Modificar datos del Padre</h2>

    <form action="guardar-padre.php" method="POST">
        <!---Parte del nombre del Padre--->
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
        <!---Parte del ApellidoPaterno del Padre--->
            <div class="form-group">
                <label for="apellido-paterno">Apellido Paterno:</label>
                <input type="text" id="apellido-paterno" name="apellido_paterno" required>
            </div>
        <!---Parte del ApellidoMaterno del Padre--->
            <div class="form-group">
                <label for="apellido-materno">Apellido Materno:</label>
                <input type="text" id="apellido-materno" name="apellido_materno" required>
            </div>
        <!---Parte del numero de control del Padre--->
            <div class="form-group">
                <label for="curp">CURP:</label>
                <input type="text" id="curp" name="curp" required>
            </div>
        <!---Parte del Grupo del Padre--->
            <div class="form-group">
                <label for="telefono">Telefono de contacto:</label>
                <input type="text" id="telefono" name="telefono" required>
            </div>
        <!---Parte del nombre del Padre--->
            <div class="form-group">
                <label for="domicilio">Domicilio:</label>
                <input type="text" id="domicilio" name="domicilio" required>
            </div>
        <!---Parte del Estatus del Padre--->
            <div class="form-group">
                <label for="estatus">Estatus:</label>
                    <select id="estatus" name="estatus" required>
                        <option value="">Selecciona una opción</option>
                        <option value="Activo">Activo</option>
                        <option value="Inactivo">Inactivo</option>
                    </select>
            </div>

            <button type="submit">Cancelar</button> 
            <button type="submit">Guardar cambios</button>

        </form>

        </div>
       </div>
</div>
    <script src="../JS/jquery-3.5.1.min.js"></script>
    <script src="../JS/headroom.min.js"></script>
    <script src="../SG1/Js/fuctionmenu.js"></script>
    <script src="../JS/reload-menu.js"></script>
script>

</body>

</html>