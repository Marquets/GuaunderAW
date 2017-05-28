<?php
	session_start();

	$db=@mysqli_connect('localhost', 'root', '', 'guaunder');
	$us_like = $_POST['like_us'];
	$us_target = $_POST['target_us'];
	$sql="INSERT INTO matches_guau (us_like, us_target) VALUES ('$us_like','$us_target')";
	$consulta=mysqli_query($db,$sql);
?>