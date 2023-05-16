<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="CSS/login.css" rel="stylesheet" type="text/css">
    <title>SGER:LOGIN</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
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
                <p>Numero de control</p>
                <input type="text" name="" id="" class="informacion">
                <p>Contraseña</p>
                <input type="text" name="" id="" class="informacion">
                <br>
                <input type="submit" name="" id="" value="Iniciar" class="inicio">
            </div>
            
            <div class="usuario2" id="usuario2">
                <p>RFC</p>
                <input type="text" name="" id=""class="informacion">
                <p>Contraseña</p>
                <input type="text" name="" id=""class="informacion">
                <br>
                <input type="submit" name="" id="" value="Iniciar" class="inicio">
            </div>
            <div class="usuario3" id="usuario3">
                <p>No Ficha</p>
                <input type="text" name="" id=""class="informacion">
                <p>NIP</p>
                <input type="text" name="" id=""class="informacion">
                <br>
                <input type="submit" name="" id="" value="Iniciar" class="inicio"> 
                
                <a href="ficha.php" class="inicio">Solicitar Ficha</a>
            </div>

        </div>
    </div>
</div>
<script src="JS/paginalogin.js"></script>
</body>
</html>