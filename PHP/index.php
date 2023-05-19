<?php
require('conexion.php');
if(!empty($_POST['username'])){
    session_start();
    $usuario= $_POST['username'];
	$password= $_POST['password'];
    $query= "select count(*) as contar From usuarios where numerousuario='$usuario' and password='$password'";
    $role="select role from usuarios where numerousuario='$usuario' and password='$password'";
    $consulta= mysqli_query($con,$query);
    $consulta2=mysqli_query($con,$role);
    $arreglo=mysqli_fetch_array($consulta2);
    $array = mysqli_fetch_array($consulta);
    if($array['contar']>0){
		//crear una variable de sesion
        if($arreglo['role']==1){
		$_SESSION['username']=$usuario;
		
        }
	}else{
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
    <link href="../CSS/login.css" rel="stylesheet" type="text/css">
    <title>SGER:LOGIN</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
</head>
<body>
<div class="todo">
    <div class="imagen">
        <img src="../IMG/logo.jpeg" alt="" class="logo">
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
                <input type="text" name="password" id="" class="informacion">
                <br>
                
                <input type="submit" name="" id="" value="Iniciar" class="inicio" onclick="foo();">
                </form>
            </div>
            
            <div class="usuario2" id="usuario2">
                <form action="index.php" method="post">
                <p>RFC</p>
                <input type="text" name="username" id=""class="informacion">
                <p>Contraseña</p>
                <input type="text" name="password" id=""class="informacion">
                <br>
                <input type="submit" name="" id="" value="Iniciar" class="inicio">
                </form>
            </div>
            <div class="usuario3" id="usuario3">
                <form action="index.php" method="post">
                <p id="texto">CURP</p>
                <input type="text" name="username" id="texto"class="informacion">
                
                <br>
                <input type="submit" name="" id="botones" value="Iniciar" class="inicio"> 
                <a href="ficha.php" class="inicio" id="botones">Solicitar Ficha</a>
                </form>
            </div>
            
        </div>
    </div>
</div>
<script src="../JS/paginalogin.js"></script>
</body>
</html>