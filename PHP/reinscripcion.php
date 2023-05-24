<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>interfaz de reinscripcion</title>
    <link rel="stylesheet" href="../CSS/estilos.css">
</head>
<body>
    <div class="reinscripcion_titulo">
 
   

   <style>
        .usuario-info {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: #dadada;
    border: 1px solid #ddd;
    border-radius: 5px;
  }
  
  .usuario-info h2 {
    font-size: 28px;
    margin-bottom: 20px;
    text-align: center;
  }
  
  .usuario-info p {
    font-size: 16px;
    line-height: 1.5;
    margin-bottom: 10px;
  }
  
  .usuario-info strong {
    font-weight: bold;
  }
  
  .usuario-info p:last-child {
    margin-bottom: 0;
  }  
  .usuario-info button[type="submit"] {
    display: block;
    margin-top: 20px;
    padding: 10px 20px;
    font-size: 16px;
    font-weight: bold;
    color: #fff;
    background-color: #007bff;
    border: none;
    border-radius: 5px;
    box-shadow: 0 3px 5px rgba(0,0,0,0.2);
    cursor: pointer;
    transition: background-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
    text-decoration: none;
  }
  
  .usuario-info button[type="submit"]:hover {
    background-color: #0069d9;
    box-shadow: 0 5px 7px rgba(0,0,0,0.3);
    text-decoration: none;
  }
.usuario{
 width: 15%;
 display: flex;

}
.contenido_principal{
    display: flex;
}
.al{
    text-decoration: none;
}
    </style>
    <div class="contenido">
        <div class="contenido_principal" id="contenido_menu">
            <div class="usuario-info">
            <img src="../Icons/usuario.svg" class="usuario"> <h2>Datos de reinscripción</h2>
                <p><strong>Nombre:</strong> Juan</p>
                <p><strong>Apellido paterno:</strong> Pérez</p>
                <p><strong>Apellido materno:</strong> Gómez</p>
                <p><strong>CURP:</strong> SFFSQ21312SQ1</p>
                <p><strong>Correo institucional:</strong> juan.perez@universidad.edu.mx</p>
                <button type="submit">Reinscribir</button>
            </div>

        </div>

    </div>
    
</body>
</html>