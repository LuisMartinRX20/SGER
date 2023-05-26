<?php
/*Datos de conexion a la base de datos*/
$db_host = "localhost";
$db_user = "root";
$db_pass = "12345678";
$db_name = "sger";

$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if(mysqli_connect_errno()){
	//echo 'No se pudo conectar a la base de datos : '.mysqli_connect_error();
}{
	//echo'Estamos conectados';
}
?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>