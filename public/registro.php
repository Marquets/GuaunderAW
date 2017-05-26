<?php
	//Cargamos todos los valores que nos llegan del formulario
	$nick=isset($_POST['nick'])? $_POST['nick']: null;
	$mail=isset($_POST['mail'])? $_POST['mail']: null;
	$nombre_usuario=isset($_POST['usuario'])? $_POST['usuario']: null;
	$clave=isset($_POST['clave'])? $_POST['clave']: null;
	$fecha_nacimiento=isset($_POST['fecha'])? $_POST['fecha']: null;

	$hashed_clave = password_hash($clave, PASSWORD_BCRYPT);

	$date=date('Y-m-d H:i:s');

	//Ponemos al principio todas las variables de error a false
	session_start();
	$_SESSION['error_bd']=false;
	$_SESSION['incompletos']=false;
	$_SESSION['error_post']=false;

	//Comprobamos que el metodo utilizado es post
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		//Comprobamos si hay alguna variable que valga null
		if($nick!=null && $mail!=null && $nombre_usuario!=null && $clave!=null&& $fecha_nacimiento!=null){
			$db=@mysqli_connect('localhost', 'root', '', 'guaunder');
			//comprobamos que la bd se haya abierto correctamente
			if($db){
				//Realizamos la consulta SQL
				$sql="INSERT INTO `usuario`(`ID`, `nick_us`, `nombre_us`, `fecha_nacimiento`, `clave_us`, `ubicacion`, `email`, `fecha_creacion`, `ult_conexion`, `foto_perfil`, `descripcion`) VALUES ('','$nick','$nombre_usuario','$fecha_nacimiento','$hashed_clave','','$mail','$date','$date','','')";
				$consulta=mysqli_query($db,$sql);

				//El usuario se ha logeado de forma correcta, se guardan sus datos en variables de sesión
				//Iniciamos sesión con los datos del usuario

				$_SESSION['estado'] = 'Autenticado';
				$_SESSION['id']=$fila['ID'];
				$_SESSION['nick']=$fila['NICK_US'];
				$_SESSION['nombre']=$fila['NOMBRE_US'];
				$_SESSION['fecha_nacimiento']=$fila['FECHA_NACIMIENTO'];
				$_SESSION['ubicacion']=$fila['UBICACION'];
				$_SESSION['email']=$fila['EMAIL'];
				$_SESSION['fecha_creacion']=$fila['FECHA_CREACION'];
				$_SESSION['fecha_conexion']=$fila['ULT_CONEXIÓN'];
				$_SESSION['foto_perfil']=$fila['FOTO_PERFIL'];
				$_SESSION['descripcion']=$fila['DESCRIPCIÓN'];

				header("Location: perfil_propio.php");
			}
			//La base de datos no se ha abierto correctamente
			else{
				$_SESSION['error_bd']=true;
				header("Location: registro_formulario.php");
			}
		}
		//Alguna de las variables vale null
		else{
			$_SESSION['incompletos']=true;
			header("Location: registro_formulario.php");

		}
	}
	//El metodo usado no es POST
	else{
		$_SESSION['error_post']=true;
		header("Location: registro_formulario.php");
	}

?>