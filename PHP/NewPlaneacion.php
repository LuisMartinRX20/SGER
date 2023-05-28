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
            $materia = mysqli_real_escape_string($con, (strip_tags($_POST["materia"], ENT_QUOTES))); //Escanpando caracteres 
            $grupo = mysqli_real_escape_string($con, (strip_tags($_POST["grupo"], ENT_QUOTES))); //Escanpando caracteres 
            $descr = mysqli_real_escape_string($con, (strip_tags($_POST["descr-p"], ENT_QUOTES))); //Escanpando caracteres 
            $Fini = mysqli_real_escape_string($con, (strip_tags($_POST["F_ini"], ENT_QUOTES)));
            $Ffin = mysqli_real_escape_string($con, (strip_tags($_POST["F_fin"], ENT_QUOTES)));
            $id_profe=1;    //aquí se pone el ID del profesor activo en la sesion

            /*consulta que verifica que no exista otro igual */
           // $miConsulta = "select * from ficha where curp ='$curp'"; //crear consulta que seleccione el registro donde el campo codigo sea igual a la variable $codigo
           // $cek = mysqli_query($con, $miConsulta);
            /*condicion */
            
                /*inserta los valores que estan en los campos de texto */
                $miConsulta = "INSERT INTO planeacion (id_materia, id_grupo, id_profesor, descripcion, fecha_inicio, fecha_fin)
                         VALUES('$materia','$grupo','$id_profe','$descr','$Fini','$Ffin')"; //crear la consulta del INSERT INTO 
                $insert = mysqli_query($con, $miConsulta) or die(mysqli_error());
                if ($insert) {
                    /**Alerta de se hizo el registro */
                    echo '<script type="text/javascript">
                            alert("Planeacion Guardada");
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
                     <p class="encabezado2">Nueva planeacion</p>
                    <br>
                    <p>Materia</p>
                    <select name="materia" id="materia" required>
                        <option value="1">Español</option>
                        <option value="2">Matematicas</option>
                        <option value="3">Ciencias naturales</option>
                        <option value="4">F.C y E</option>
                        <option value="5">Historia</option>
                        <option value="6">Educacion fisica</option>
                    </select>
                    <p>ID del Grupo</p>
                    <input type="text" name="grupo" id="informacion">
                    <p>Descripcion de planeacion </p>
                    <textarea name="descr-p" id="descripcion" cols="55" rows="4"></textarea>
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
               
                <p  class="encabezado2">Nueva planeacion</p>
                <br>
                    <p>Fecha de inicio</p>
                    <input type="date" name="F_ini" id="informacion">
                    <p>Fecha de termino</p>
                    <input type="date" name="F_fin" id="informacion">
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