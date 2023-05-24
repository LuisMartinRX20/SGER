<?php
session_start();
require('PHP/conexion.php');
if (!empty($_POST['username'])) {
    $usuario = $_POST['username'];
    $password = $_POST['password'];
    $query = "select count(*) as contar From usuarios where numerousuario='$usuario' and password='$password'";
    $role = "select role from usuarios where numerousuario='$usuario' and password='$password'";
    $consulta = mysqli_query($con, $query);
    $consulta2 = mysqli_query($con, $role);
    $arreglo = mysqli_fetch_array($consulta2);
    $array = mysqli_fetch_array($consulta);
    if ($array['contar'] > 0) {
        //crear una variable de sesion
        if ($arreglo['role'] == 1) {
            $role_usuario = "Padre";
            $_SESSION['username'] = array();
            $_SESSION['username'][0] = $usuario;
            $_SESSION['username'][1] = $role_usuario;
            header("Location:PHP/menu-padre.php");
        }
        if ($arreglo['role'] == 2) {
            $role_usuario = "Profesor";
            $_SESSION['username'] = array();
            $_SESSION['username'][0] = $usuario;
            $_SESSION['username'][1] = $role_usuario;
            header("Location:PHP/menu-profesor.php");
        }
        if ($arreglo['role'] == 3) {
            $role_usuario = "Control-Escolar";
            $_SESSION['username'] = array();
            $_SESSION['username'][0] = $usuario;
            $_SESSION['username'][1] = $role_usuario;
            header("Location:PHP/menu-controlEscolar.php");
        }
    } else {
        echo "USUARIO INCORRECTO";
    }
}
else if(!empty($_POST['curp'])){
    session_start();
    $curp= $_POST['curp'];
    $quer= "select count(*) as contar From ficha where curp='$curp' ";
    $miconsulta=mysqli_query($con,$quer);
    $arrei= mysqli_fetch_array($miconsulta);
    if($arrei['contar']>0){
        $_SESSION['curp']=$curp;
        header("location: PHP/infoficha.php");
    }
    else{
        echo "USUARIO INCORRECTO";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="CSS/login.css" rel="stylesheet" type="text/css">
    <title>SGER:LOGIN</title>
</head>

<body>
    <div class="todo">
        <div class="imagen">
            <img src="IMG/logo.jpeg" alt="" class="logo">
        </div>
        <div class="login">
            <div class="opciones">
                <ul>
                    <li class=""><button class="padre active" id="bpadre">Padre / Tutor</button></li>
                    <li class=""><button class="personal" id="bpersonal">Personal</button></li>
                    <li class=""><button class="ficha" id="bficha"> Ficha</button></li>
                </ul>
            </div>
            <div class="formulario">
                <div class="usuario1 active" id="usuario1">
                    <form action="index.php" method="post">
                        <p>Numero de control</p>
                        <input type="text" name="username" id="" class="informacion">
                        <p>Contraseña</p>
                        <input type="password" name="password" id="" class="informacion">
                        <br>

                        <input type="submit" name="" id="" value="Iniciar" class="inicio" onclick="foo();">
                    </form>
                </div>

                <div class="usuario2" id="usuario2">
                    <form action="index.php" method="post">
                        <p>RFC</p>
                        <input type="text" name="username" id="" class="informacion">
                        <p>Contraseña</p>
                        <input type="password" name="password" id="" class="informacion">
                        <br>
                        <input type="submit" name="" id="" value="Iniciar" class="inicio">
                    </form>
                </div>
                <div class="usuario3" id="usuario3">
                    <form action="index.php" method="post">
                        <p id="texto">CURP</p>
                        <input type="text" name="curp" id="texto" class="informacion">
                        <br>
                        <input type="submit" name="" id="botones" value="Iniciar" class="inicio">
                        <a href="PHP/ficha.php" class="inicio" id="botones">Solicitar Ficha</a>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <script src="JS/paginalogin.js"></script>
</body>

</html>