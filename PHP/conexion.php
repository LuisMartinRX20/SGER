<?php
/*Datos de conexion a la base de datos*/
$db_host = "localhost";
$db_user = "Luis Martin";
$db_pass = "20092002";
$db_name = "sger";

$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if(mysqli_connect_errno()){
	echo 'No se pudo conectar a la base de datos : '.mysqli_connect_error();
}
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

