<?php
	session_start();
	$db = @mysqli_connect('localhost', 'root', '', 'guaunder');

	if ($db) {
		//$remitente = $_SESSION['nick'];
		$remitente = 'samgar01';
		$destinatario = $_POST['select_destinatary'];
		$cuerpo = $_POST['message_content'];
		$fecha = date("Y-m-d H:i:s");

		$sql = mysqli_query($db,"INSERT into mensajes (Destinatario, Remitente, Cuerpo, fecha) VALUES ('$destinatario', '$remitente', '$cuerpo', '$fecha')");

		header('Location: chats.php');
	} else {
		echo '<script type="text/javascript">alert("Error al conectar base de datos")</script>';
		header('Location: chats.php');
	}

	@mysqli_close($db);

?>