<?php
	session_start();

	$_SESSION['sqlAdmin']="SELECT * FROM usuario";

	header("Location: usuariosregistrados.php");
?>