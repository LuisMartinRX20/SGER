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
    <div class="grid-contnew">
        <h2>Nueva terea:</h2><br>

        <div class="grid-contt">


            <div class="grid-item">
                <label for="titulo">Tarea:</label>
                <input type="text" name="titulo" required><br>
            </div>

            <div class="grid-item">
                <label for="instr">Instrucciones:</label>
                <input type="text" name="instr" required><br>
            </div>

            <div class="grid-item">
                <label for="materia">Materia:</label>
                <select name="materia" id="materia">
                    <option value="Español">Español</option>
                    <option value="Español">Matematicas</option>
                    <option value="Español">Historia</option>
                    <option value="Español">F.C y E</option>
                    <option value="Español">Geografia</option>
                </select><br>
            </div>

            <div class="grid-item">
                <label for="grupo">Grupo:</label>
                <input type="text" name="grupo" required><br>
            </div>
            <div class="grid-item">
                <label for="titulo">Fecha de vencimiento:</label>
                <input type="date" name="fecha" required><br>
            </div>
            <div class="grid-item">
                <label for="hora">Hora de vencimiento:</label>
                <input type="time" name="hora" required><br>
            </div>
            <div class="grid-item">
                <label for="file">adjuntar recursos:</label>
                <input type="file" name="file" required><br>
            </div>
        </div>

        <div id="btndiv">
            <a href="AsigTarea.php" class="anew">
                <input type="button" id="cancel" value="CANCELAR">
            </a>
            <a href="#" class="anew">
                <input type="button" id="nuevaTarea" value="MODIFICAR">
            </a>
        </div>
    </div>
</body>

</html>