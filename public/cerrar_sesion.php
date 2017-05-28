<?php
session_start();

//Vamos a guardar en la base de datos la fecha y la hora en que se ha desconectado en el atributo ultima_conexion
//Volcamos en una variable la fecha y la hora actual
$date=date('Y-m-d H:i:s');
$id_usuario=$_SESSION['id'];
//Abrimos la base de datos
$db=@mysqli_connect('localhost', 'root', '', 'guaunder');
//comprobamos que la bd se haya abierto correctamente
	if($db){
		//Actualizamos el atributo ult_conexion del usuario con la fecha actual
		$sql="UPDATE `usuario` SET`ult_conexion`='$date' WHERE ID='$id_usuario'";
		$consulta=mysqli_query($db,$sql);

		//Cerramos la sesión y redirigimos a index.html
		session_destroy();
		header("Location: index.html");
	}
	//Si no se accedio correctamente a la base de datos
	else{
		//Ponemos a true el error de la base de datos y redirigimos a la pagPrincipal
		$_SESSION['error_bd']=true;
		header("Location: pagPrincipal.html");
	}

?>
