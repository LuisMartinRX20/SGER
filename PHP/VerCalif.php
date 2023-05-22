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
                <label for="materia">Materia:</label>
                <select name="materia" id="materia" required>
                    <option value="Español">Español</option>
                    <option value="Matematicas">Matematicas</option>
                    <option value="Historia">Historia</option>
                    <option value="F.C y E">F.C y E</option>
                    <option value="Geografia">Geografia</option>
                </select>
                <label for="bloque">Bloque: </label>
                <select name="bloque" id="bloque" required>
                    <option value="1">Bloque 1</option>
                    <option value="2">Bloque 2</option>
                    <option value="3">Bloque 3</option>
                    <option value="4">Bloque 4</option>
                    <option value="5">Bloque 5</option>
                </select><br>
            </form>
        </div>
        <br><br>
        <div id="tabla-cal">
            <center>
                <table id="t-cal">
                    <tr>
                        <th>#</th>
                        <th id="al-nombre">Alumno</th>
                        <th>Calif.</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Becerra Camarena Rodrigo</td>
                        <td>8</td>
                    </tr>

                </table>
            </center>
        </div>
    </div>
</body>

</html>