<?php
	session_start();
	if (!isset($_SESSION['nick'])) {
		header("Location: index.html");
	}

	$db=@mysqli_connect('localhost', 'root', 'root', 'guaunder');
	$nick = $_SESSION['nick'];
	$sql="select count(*) cuenta from matches_guau m where m.us_like<>'".$_SESSION['nick']."' and m.us_target='".$_SESSION['nick']."' and exists(select * from matches_guau m1 where m1.us_like='".$_SESSION['nick']."' and m1.us_target=m.us_like)";
	$consulta=mysqli_query($db,$sql);
	$numMatches = mysqli_fetch_assoc($consulta);
	if ($_SESSION['num_matches'] < $numMatches['cuenta']) {
		$_SESSION['num_matches'] = $numMatches['cuenta'];
		echo "SI";
	}
	else
		echo "NO";
?>