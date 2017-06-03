<?php
	session_start();
	if(isset($_SESSION['id']) and $_SESSION['estado'] == 'Autenticado'){
		if($_SESSION['nick']!='admin')
			header("Location: pagPrincipal.php");
	}
	if(isset($_GET['nick'])){
		$nick=$_GET['nick'];
		$db = @mysqli_connect('localhost','root','root','guaunder');
		$sql="delete from usuario where nick_us='$nick'";
		$consulta=mysqli_query($db,$sql);
		$_SESSION['error_borrar_usr']=false;
		header("Location: usuariosregistrados.php");
	}
	else{
		$_SESSION['error_borrar_usr']=true;
		header("Location: usuariosregistrados.php");
	}
?>