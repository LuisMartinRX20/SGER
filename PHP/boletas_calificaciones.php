<html>
    <head>
        <title>Calificaciones</title>
        <style>
               table {
                border-collapse: collapse;
                width: 100%;
                margin-bottom: 20px;
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
                }
                .container {
                    max-width: 800px;
                    margin: 0 auto;
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
                .regresar{
                    text-decoration: none;
                }
                .modificar{
                    text-decoration: none;
                }
                .Butoon{
                    display: flex;
                    margin-left: 75%;
                }
        </style>
    </head>
    <body>
    <div class="contenido">
        <div class="contenido_principal" id="contenido_menu">
        <div class="contenido_principal_header" id="contenido_menu_header">
            <h1>Boletas de calificaciones</h1>
		<table>
			<tr>
				<th>Materia</th>
				<th>1er trimestre</th>
				<th>2do trimestre</th>
				<th>3er trimestre</th>
			</tr>
			<tr>
				<td>Matemáticas</td>
				<td>8.5</td>
				<td>9.0</td>
				<td>9.2</td>
			</tr>
			<tr>
				<td>Español</td>
				<td>9.2</td>
				<td>9.5</td>
				<td>9.4</td>
			</tr>
			<tr>
				<td>Historia</td>
					<td>7.8</td>
					<td>8.0</td>
				<td>8.5</td>
			</tr>
			<tr>
				<td>Ciencias naturales</td>
				<td>8.9</td>
				<td>9.2</td>
				<td>9.0</td>
			</tr>
			<tr>
				<td>Formación cívica y ética</td>
				<td>9.1</td>
				<td>9.3</td>
				<td>9.5</td>
			</tr>
			<tr>
				<td>Educación física</td>
				<td>8.0</td>
				<td>8.5</td>
				<td>8.7</td>
			</tr>
			<tr>
				<td>Geografía</td>
				<td>8.3</td>
				<td>8.8</td>
				<td>8.6</td>
			</tr>
			<tr>
				<td>Biología general</td>
				<td>9.5</td>
				<td>9.6</td>
				<td>9.7</td>
			</tr>
		</table>
        <div class="Butoon">
            <div>
            <a class="regresar" href="../PHP/bienvenida.php"><button type="submit">Regresar</button></a>  
            </div>
        </div> 
    </body>
</html>