<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	<title>Boletas de calificaciones</title>
	<style>
        body{
            max-width: 800px;
            max-height: 500px;
            padding: 20px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
            background-color: #fff;
        }
        th, td {
            text-align: left;
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        h1 {
            text-align: center;
            margin-top: 50px;
            color:antiquewhite;
            border-color: black;
            
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            opacity: 1;
        }
        .Butoon button[type="submit"] {
            display: flex;
            margin-left: 50%;
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
        }
        
        .Butoon button[type="submit"]:hover {
            background-color: #0069d9;
            box-shadow: 0 5px 7px rgba(0,0,0,0.3);
            text-decoration: none; 
        }
        .Butoon{
            display: flex;
            margin-left: 75%;
        }
        .A{
            text-decoration: none;
            color: #fff;
        }

	</style>
</head>
<body>
	<div class="container">
		<div class="contenido_principal" id="contenido_menu">
			<div class="contenido_principal_header" id="contenido_menu_header">
				<h1>Boletas de calificaciones</h1>
				<table>
					<tr>
						<th>Materia</th>
						<th>Calificación</th>
                        <th>Acciones</th>
						
					</tr>
					<?php
					include 'conexion.php';
                    
					$id_alumno = $_GET['id']; // ID del alumno para obtener las calificaciones
                    
                   // $id_alumno='4';
					$sql= "SELECT * FROM calificaciones c INNER JOIN materia m ON c.id_materia= m.id_materia WHERE id_alumno= '$id_alumno'";
					$result = $con->query($sql);

					if ($result->num_rows > 0) {
						// Mostrar los datos en la tabla
						while ($row = $result->fetch_assoc()) {
							echo '
						<tr>
							
						<td>'.$row['nombre'].'</td>
						<td>'.$row['calif_P2'].'</td>
                        <td>
								<a href="editar_calTri1.php?nik='.$row['id_materia'].'"><i class="bi bi-clipboard">Editar</i></a>
								
                                </td>
						</tr>
                        ';
						}
					} else {
						echo "<tr><td colspan='4'>No se encontraron calificaciones para el alumno.</td></tr>";
					}

					$con->close();
					?>
				</table>
			</div>
		</div>
	</div>
</body>
</html>
