<?php
	session_start();
	if (!isset($_SESSION['nick'])) {
		header("Location: index.html");
	}

	$db=@mysqli_connect('localhost', 'root', 'root', 'guaunder');
	$us_like = $_POST['like_us'];
	$us_target = $_POST['target_us'];
	$sql="INSERT INTO matches_guau (us_like, us_target) VALUES ('$us_like','$us_target')";
	$consulta=mysqli_query($db,$sql);

	//miramos si ya había un like de la persona que acabamos de dar like
	$sqlMatch = "SELECT us_target FROM matches_guau WHERE us_like='$us_target' and us_target='$us_like'";
	$consulta=mysqli_query($db,$sqlMatch);
	if (mysqli_num_rows($consulta) == 1) {
		//ya había un like, incrementamos el número de matches del usuario
		$sqlSumaMatch="UPDATE usuario SET num_matches=num_matches+1 WHERE nick_us='$us_like'";
		$consulta=mysqli_query($db,$sqlSumaMatch);
	}
?>