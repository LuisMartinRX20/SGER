<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir tareas</title>
    <link rel="stylesheet" href="../CSS/estilos.css">
</head>
<body>
  

     <div class="titulos_tareas">
    <h1>EJERCICIOS SUMAS Y RESTAS</h1>

    <p>
    <strong>Instrucciones: </strong><br>
        Resolver los ejercicios asignados <br>
        y subir en formato PDF
    </p>

    <p1>
        Matemáticas / Grupo 2B / Vence 29 de abril 23:59 PM
    </p1>

    </div>

    <form action="subir_tarea.php" method="post" enctype="multipart/form-data">
  <label for="archivo"></label>
  <input type="file" id="archivo" name="archivo" style="display: none;">
  
  <div class="icono_adjuntar">
  <img src="../ICONS/adjuntar_archivo.png" id="imagen" alt="Subir tarea" onclick="seleccionarArchivo()">
  <p>Adjuntar archivos</p>
   <input type="submit" value="Entregar">
   <input class="btn_cancelar_tarea" type="reset" value="Cancelar">
   </form>
   </div>

<script>
function seleccionarArchivo() {
  document.getElementById('archivo').click();
}
</script>

</body>
</html>