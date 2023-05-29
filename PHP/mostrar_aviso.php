<?php
include("conexion.php");
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Datos de empleados</title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style_nav.css" rel="stylesheet">

	<style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap');
        body{
            font-family: 'Roboto', sans-serif;
        }
		.content {
			margin-top: 80px;
		}
        table,th,td{
            border: 1px solid;
            text-align: center;
        }
        table{
            width: 100%;
        }
        #profesor{
            width:30%;
        }
        #no{
            width:5%;
        }
       
	</style>

</head>
<body>

	<div class="container">
		<div class="content">
			<h2>AVISOS</h2>
			
			<div class="table-responsive">
			<table class="table table-striped table-hover">
				<tr>
                    <th id="no">No</th>
                    <th id="profesor">Profesor</th>
					<th>Informacion</th>
					
				</tr>
				<?php
                    $miConsulta = "SELECT * FROM avisos"; //crear una consulta que muestre a todos los empleados de la tabla empleados ordenadas por el campo código
					$sql = mysqli_query($con, $miConsulta);
				
				if(mysqli_num_rows($sql) == 0){
					echo '<tr><td colspan="8">No hay datos.</td></tr>';
				}else{
					$no = 1;
					while($row = mysqli_fetch_assoc($sql)){
                        $miConsulta = "SELECT nombre,apellido_P,apellido_M FROM profesor where id_profesor='$row[id_profesor]' "; //crear una consulta que muestre a todos los empleados de la tabla empleados ordenadas por el campo código
					    $profesor = mysqli_query($con, $miConsulta);
                        $dato=mysqli_fetch_assoc($profesor);
						echo '
						<tr>
							<td>'.$no.'</td>
							<td>'.$dato['nombre'].' '.$dato['apellido_P'].' '.$dato['apellido_M'].'</td>
                            <td>'.$row['info'].'</td>';
						$no++;
					}
				}
				?>
			</table>
			</div>
		</div>
	</div><center>
    <p>&copy; Sistemas Web <?php echo date("Y");?></p>
		</center>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>