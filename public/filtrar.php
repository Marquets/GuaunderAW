<?php
	session_start();

	$hoy = date('Y-m-d 00:00:00');

	$_SESSION['sqlAdmin']="SELECT * FROM usuario WHERE ult_conexion >= '$hoy'";

	header("Location: usuariosregistrados.php");
?>