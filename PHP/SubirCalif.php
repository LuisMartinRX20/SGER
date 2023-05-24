<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/estilosRodri.css">
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
        <div id="tabla-cal-plus">
            <center>
                <table id="t-cal-plus">
                    <tr id="tr-titulo">
                        <th>Materia</th>
                        <th>Bloque 1</th>
                        <th>Bloque 2</th>
                        <th>Bloque 3</th>
                        <th>Promedio</th>
                        
                    </tr>
                    <tr id="mat">
                        <td>Español</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr id="mat">
                        <td>Matematicas</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr id="mat">
                        <td>Ciencias naturales</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr id="mat">
                        <td>Formacion civica y etica</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr id="mat">
                        <td>Historia</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr id="mat">
                        <td>Educacion fisica</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                </table>
            </center>
        </div>
    </div>
</body>

</html>