<?php
	//Cargamos todos los valores que nos llegan del formulario
	$nick=isset($_POST['nick'])? $_POST['nick']: null;
	$mail=isset($_POST['mail'])? $_POST['mail']: null;
	$nombre_usuario=isset($_POST['usuario'])? $_POST['usuario']: null;
	$clave=isset($_POST['clave'])? $_POST['clave']: null;
	//Comprobamos que el metodo utilizado es post
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		//Comprobamos si hay alguna variable que valga null
		if($nick!=null && $mail!=null && $nombre_usuario!=null && $clave!=null){
			$db=@mysqli_connect('localhost', 'root', '', 'guaunder');
			//comprobamos que la bd se haya abierto correctamente
			if($db){

			}
			//La base de datos no se ha abierto correctamente
			else{

			}
		}
		//Alguna de las variables vale null
		else{

		}
	}
	//El metodo usado no es POST
	else{

	}

?>