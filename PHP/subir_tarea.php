<!DOCTYPE html>
<html lang="en">
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    padding: 20px;
}

h1 {
    text-align: center;
    margin-bottom: 20px;
}

form {
    max-width: 400px;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
}

input[type="file"] {
    display: block;
    margin-bottom: 10px;
}

.btn_subir {
    display: block;
    margin-top: 20px;
    padding: 10px 20px;
    font-size: 16px;
    font-weight: bold;
    color: #fff;
    background-color: #007bff;
    border: none;
    border-radius: 5px;
    box-shadow: 0 3px 5px rgba(0, 0, 0, 0.2);
    cursor: pointer;
    transition: background-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
}

.btn_subir:hover {
    background-color: #0069d9;
    box-shadow: 0 5px 7px rgba(0, 0, 0, 0.3);
}

    </style>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/formulario_tarea.css">
    <title>Subir Tarea</title>
</head>
<body>
    <h1>Subir Tarea</h1>
    <form action="tarea.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="archivo">
        <input type="submit" value="Subir archivo" class="btn_subir">
      
    </form>
</body>
</html>
