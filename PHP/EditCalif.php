<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/estilos.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <title>Inicio</title>
</head>

<body>
    <div class="flex-cont">
        <div id="form-cal">
            <form action="">
                <label for="periodo">Periodo: </label>
                <select name="periodo" id="periodo" required>
                    <option value="EJ2023">Enero-Junio/2023</option>
                    <option value="AD2023">Agosto-Diciembre/2023</option>
                </select>
                
            </form>
        </div>
        <br><br>
        <div id="tabla-cal">
            <center>
                <table id="t-cal">
                    <tr>
                        <th>#</th>
                        <th id="al-nombre">Alumno</th>
                        <th></th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Becerra Camarena Rodrigo</td>
                        <td><a href="">Ver </a> <a href="">Editar </a></td>
                    </tr>

                </table>
            </center>
        </div>
    </div>
</body>

</html>