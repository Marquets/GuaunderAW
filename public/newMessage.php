<?php
	session_start();
	$db = @mysqli_connect('localhost', 'root', 'root', 'guaunder');

	if ($db) {
		var_dump($_POST);

		$remitente = $_SESSION['nick'];
		if ($_POST['remitente']) {
			$destinatario = $_POST['remitente'];
		} else {
			$destinatario = $_POST['select_destinatary'];
		}
		$cuerpo = utf8_decode($_POST['message_content']);
		$fecha = date("Y-m-d H:i:s");

		$sql = mysqli_query($db,"INSERT into mensajes (Destinatario, Remitente, Cuerpo, fecha) VALUES ('$destinatario', '$remitente', '$cuerpo', '$fecha')");

		header('Location: chats.php');
	} else {
		echo '<script type="text/javascript">alert("Error al conectar base de datos")</script>';
		header('Location: chats.php');
	}

	@mysqli_close($db);

?>