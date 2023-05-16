<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="CSS/ficha.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <title>SGER:FIcha</title>
</head>
<body>
    <div class="fondo">
        <div class="titulo">
            <h1 id="encabezado">Solicitar Ficha</h1>
                <ul>
                    <li class="opcion active" id="opcion1">1</li>
                    <li class="opcion" id="opcion2">2</li>
                    <li class="opcion" id="opcion3">3</li>
                    <li class="opcion" id="opcion4">4</li>
                </ul>
                <br>
            </div>    
            <div class="formulario">
                
                <div class="pagina1 active " id="contenido1">
                    <p  class="encabezado2">Datos del Alumno</p>
                    <p>Nombre</p>
                    <input type="text" name="" id="informacion">
                    <p>Apellido Paterno</p>
                    <input type="text" name="" id="informacion">
                    <p>Apellido Materno</p>
                    <input type="text" name="" id="informacion">
                    <p>Fecha Nacimiento</p>
                    <input type="text" name="" id="informacion">
                    <br>
                    <a href="index.php" class="cancelar">Cancelar</a>
                    <button class="botonS1" id="boton">Siguiente</button>
                </div>
                <div class="pagina2 " id="contenido2">
                    
                    <br>
                    <p >Calle</p>
                    <input type="text" name="" id="informacion">
                    <p>No.</p>
                    <input type="text" name="" id="informacion">
                    <p>Colonia</p>
                    <input type="text" name="" id="informacion">
                    <p>Codigo Postal</p>
                    <input type="text" name="" id="informacion">
                    <br>
                    <button class="botonA1" id="boton">Anterior</button>
                    <button class="botonS2" id="boton">Siguiente</button>
                </div>
                <div class="pagina3 "  id="contenido3">
                    <p  class="encabezado3">Datos del Padre/ Tutor</p>
                    <p>Nombre</p>
                    <input type="text" name="" id="informacion">
                    <p>Apellido Paterno</p>
                    <input type="text" name="" id="informacion">
                    <p>Apellido Materno</p>
                    <input type="text" name="" id="informacion">
                    <p>Fecha Nacimiento</p>
                    <input type="text" name="" id="informacion">
                    <br>
                    <button class="botonA2" id="boton">Anterior</button>
                    <button class="botonS3" id="boton">Siguiente</button>
                </div>
                <div class="pagina4 " id="contenido4">
                    <p >Calle</p>
                    <input type="text" name="" id="informacion">
                    <p>No.</p>
                    <input type="text" name="" id="informacion">
                    <p>Colonia</p>
                    <input type="text" name="" id="informacion">
                    <p>Codigo Postal</p>
                    <input type="text" name="" id="informacion">
                    <p>Telefono</p>
                    <input type="text" name="" id="informacion">
                    <br>
                    <button class="botonA3" id="boton">Anterior</button>
                    <input type="submit" name=""  value= "Enviar" id="boton">
                    
                </div>
            </div>
    </div>
    <script src="JS/paginaficha.js"></script>
</body>
</html>