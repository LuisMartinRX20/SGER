<?php
require('conexionRodri.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../CSS/formularioRodri.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <title>SGER:FIcha</title>
</head>

<body>
    <div class="fondo">
        <?php
        /*Variables para obtener el valor de los campos 
        aqui deben poner el nombre de los inputs */
        if (isset($_POST['enviar'])) {
            /**si se necesitan mas variables copiar y pegar si no borrar las que sobran */
            $id_alumno = mysqli_real_escape_string($con, (strip_tags($_POST["idAlumno"], ENT_QUOTES))); //Escanpando caracteres 
            $materia = mysqli_real_escape_string($con, (strip_tags($_POST["materia"], ENT_QUOTES))); //Escanpando caracteres 
            $califP1 = mysqli_real_escape_string($con, (strip_tags($_POST["califP1"], ENT_QUOTES))); //Escanpando caracteres 
            $califP2 = mysqli_real_escape_string($con, (strip_tags($_POST["califP2"], ENT_QUOTES)));
            $califP3 = mysqli_real_escape_string($con, (strip_tags($_POST["califP3"], ENT_QUOTES)));
            $calif_F = ($califP1+$califP2+$califP3)/3;
            $id_profe=1;    //aquí se pone el ID del profesor activo en la sesion

            /*consulta que verifica que no exista otro igual */
           // $miConsulta = "select * from ficha where curp ='$curp'"; //crear consulta que seleccione el registro donde el campo codigo sea igual a la variable $codigo
           // $cek = mysqli_query($con, $miConsulta);
            /*condicion */
            
                /*inserta los valores que estan en los campos de texto */
                $miConsulta = "INSERT INTO calificaciones (id_alumno, id_materia, calif_P1, calif_P2, calif_P3, calificacion_F)
                         VALUES('$id_alumno','$materia','$califP1','$califP2','$califP3','$calif_F')"; //crear la consulta del INSERT INTO 
                $insert = mysqli_query($con, $miConsulta) or die(mysqli_error());
                if ($insert) {
                    /**Alerta de se hizo el registro */
                    echo '<script type="text/javascript">
                            alert("Boleta de guardada con exito!");
                            </script>';
                } else {
                    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudo guardar los datos !</div>';
                }
        }
        ?>
        <!-- formulario -->
        
        <form action="" method="post" class="form" enctype="multipart/form-data">
            <div class="formulario">
            
                <div class="pagina1 active " id="contenido1">
                     <!-- Pagina 1 -->
                     <p class="encabezado2">Subir boleta por materia </p>
                    <br>
                    <p>ID del alumno</p>
                    <input type="text" name="idAlumno" id="informacion">
                    <p>Materia</p>
                    <select name="materia" id="materia" required>
                        <option value="1">Español</option>
                        <option value="2">Matematicas</option>
                        <option value="3">Ciencias naturales</option>
                        <option value="4">F.C y E</option>
                        <option value="5">Historia</option>
                        <option value="6">Educacion fisica</option>
                    </select>
                    
                    <p>Calificacion de unidad 1 </p>
                    <input type="number" step=".01" name="califP1" id="p1"></input>
                    
                    <br>
                    <br><br><br>
                    <!--Indica en que pagina se encuentra agregar manualmente -->
                    <p>Pagina 1 de 2</p>
                    
                    <!--boton que cambia de ventana a la siguiente -->
                    <button type="button" class="botonS1" id="boton">Siguiente</button>
                    
                </div>
                 <!-- Pagina 2 -->
                <!--Pagina 3 -->
                <div class="pagina2 "  id="contenido2">
               
                <p  class="encabezado2">Subir boleta por materia</p>
                <br>
                <p>Calificacion de unidad 2 </p>
                    <input type="number" step=".01" name="califP2" id="p1"></input>
                    <p>Calificacion de unidad 3 </p>
                    <input type="number" step=".01" name="califP3" id="p1"></input>
                    <br>
                    <br><br><br>
                    <!--Indica en que pagina se encuentra agregar manualmente -->
                    <p>Pagina 2 de 2</p>
                    <!--boton que cambia de ventana a la anterior -->
                    <button type="button" class="botonA1" id="boton">Anterior</button>
                    <!--boton que envia el formulario -->
                    <input type="submit" name="enviar"  value= "Enviar" id="boton" class="botonA2">
                </div>    
            </div>
            </form>
    </div>
    <script src="../JS/paginacionProfe.js"></script>
</body>

</html>