<?php
session_start();
require('PHP/conexion.php');
if (!empty($_POST['noControl'])) {
    $noControl = $_POST['noControl'];
    $password = $_POST['passwordT'];
    $alumno = "select id_padre From alumno where noControl='$noControl'";
    $consultaA = mysqli_query($con, $alumno);
    $arregloA = mysqli_fetch_array($consultaA);
    if(!empty($arregloA['id_padre'])){
    $padre = "select count(*) as contar, id_padre from padre where id_padre=$arregloA[id_padre] and password='$password'";
    $consultaT = mysqli_query($con, $padre);
    $arregloT = mysqli_fetch_array($consultaT);
    if ($arregloT['contar'] > 0) {
        
            $role_usuario = "Padre";
            $_SESSION['username'] = array();
            $_SESSION['username'][0] = $arregloT['id_padre'];
            $_SESSION['username'][1] = $role_usuario;
            header("Location:PHP/menu-padre.php");
        
    } else { ?>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Contraseña o numero de control incorrectos'
            });
        });
        </script>
    <?php } ?>

    <?php }

    else{ ?>
        <script>
        document.addEventListener("DOMContentLoaded", function() {
        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Contraseña o numero de control incorrectos'
        });
    });
    </script>
    <?php }
    
}



else if(!empty($_POST['curpA'])){
    $curpA= $_POST['curpA'];
    $quer= "select count(*) as contar From ficha where curpA='$curpA' ";
    $miconsulta=mysqli_query($con,$quer);
    $arrei= mysqli_fetch_array($miconsulta);
    if($arrei['contar']>0){
        $_SESSION['curpA']=$curpA;
        header("location: PHP/infoficha.php");
    }
    else{
        ?>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'La curp no se encuentra registrada en el sistema'
            });
        });
        </script>
    <?php
    }
}
else if(!empty($_POST['RFC'])){

    $RFC= $_POST['RFC'];
    $password = $_POST['passwordP'];
    $control_escolar= "select count(*) as contar From control_escolar where RFC='$RFC' and password='$password' ";
    $profesor= "select count(*) as contar From profesor where RFC='$RFC' and password='$password' ";
    $consultaCE=mysqli_query($con,$control_escolar);
    $consultaP=mysqli_query($con,$profesor);
    $cantidadCE= mysqli_fetch_array($consultaCE);
    $cantidadP=mysqli_fetch_array($consultaP);
    if($cantidadCE['contar']>0){
        $role_usuario = "Control-Escolar";
        $_SESSION['username'] = array();
        $_SESSION['username'][0] = $RFC;
        $_SESSION['username'][1] = $role_usuario;
        header("Location:PHP/menu-controlEscolar.php");
    }
    else if ($cantidadP['contar']>0) {
            $role_usuario = "Profesor";
            $_SESSION['username'] = array();
            $_SESSION['username'][0] = $RFC;
            $_SESSION['username'][1] = $role_usuario;
            header("Location:PHP/menu-profesor.php");
            
        
    }
    else{
        ?>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Contraseña o RFC incorrectos'
            });
        });
        </script>
    <?php
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
                        <input type="text" name="noControl" id="" class="informacion" required>
                        <p>Contraseña</p>
                        <input type="password" name="passwordT" id="" class="informacion" required>
                        <br>

                        <input type="submit" name="" id="" value="Iniciar" class="inicio">
                    </form>
                </div>

                <div class="usuario2" id="usuario2">
                    <form action="index.php" method="post">
                        <p>RFC</p>
                        <input type="text" name="RFC" id="" class="informacion"  required>
                        <p>Contraseña</p>
                        <input type="password" name="passwordP" id="" class="informacion" required>
                        <br>
                        <input type="submit" name="" id="" value="Iniciar" class="inicio">
                    </form>
                </div>
                <div class="usuario3" id="usuario3">
                    <form action="index.php" method="post">
                        <p id="texto">CURP</p>
                        <input type="text" name="curpA" id="texto" class="informacion"  required>
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