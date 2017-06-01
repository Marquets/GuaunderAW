<?php
	//Cargamos todos los valores que nos llegan del formulario, si hay alguno vacio lo cargamos con un null
	$nick=isset($_POST['nick'])? $_POST['nick']: null;
	$mail=isset($_POST['mail'])? $_POST['mail']: null;
	$nombre_usuario=isset($_POST['usuario'])? $_POST['usuario']: null;
	$clave=isset($_POST['clave'])? $_POST['clave']: null;
	$fecha_nacimiento=isset($_POST['fecha'])? $_POST['fecha']: null;
	//Encriptamos la contraseña introducida para introducirla en la base de datos encriptada
	$hashed_clave = password_hash($clave, PASSWORD_BCRYPT);
	//Obtenemos la fecha y la hora actual, para introducirla en la base de datos tanto en ult_conexion como en fecha de _creación
	$date=date('Y-m-d H:i:s');
	//Iniciamos sesión y ponemos al principio todas las variables de error a false
	session_start();
	$_SESSION['error_bd']=false;
	$_SESSION['incompletos']=false;
	$_SESSION['error_post']=false;
	//Comprobamos que el metodo utilizado es POST
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		//Comprobamos si hay alguna variable que valga null, es decir, que se haya introducido en el formulario vacía
		if($nick!=null && $mail!=null && $nombre_usuario!=null && $clave!=null&& $fecha_nacimiento!=null){
			//Conectamos a la base de datos
			$db=@mysqli_connect('localhost', 'root', 'root', 'guaunder');
			//Comprobamos que la bd se haya abierto correctamente
			if($db){
				//Realizamos la consulta SQL
				$sql="INSERT INTO usuario(nick_us, nombre_us, fecha_nacimiento, clave_us, email, fecha_creacion, ult_conexion) VALUES ('$nick','$nombre_usuario','$fecha_nacimiento','$hashed_clave','$mail','$date','$date')";
				$consulta=mysqli_query($db,$sql);

				$sqlAux="SELECT ID, nick_us, nombre_us, fecha_nacimiento, clave_us, ubicacion, email, fecha_creacion, ult_conexion, foto_perfil, descripcion FROM usuario WHERE nick_us = '$nick'";
				$consultaAux=mysqli_query($db,$sqlAux);
				$fila=mysqli_fetch_assoc($consultaAux);

				//El usuario se ha logeado de forma correcta, por lo tanto se guardan sus datos en variables de sesión
				$_SESSION['estado'] = 'Autenticado';
				$_SESSION['id']=$fila['ID'];
				$_SESSION['nick']=$fila['nick_us'];
				$_SESSION['nombre']=$fila['nombre_us'];
				$_SESSION['fecha_nacimiento']=$fila['fecha_nacimiento'];
				$_SESSION['ubicacion']=$fila['ubicacion'];
				$_SESSION['email']=$fila['email'];
				$_SESSION['fecha_creacion']=$fila['fecha_creacion'];
				$_SESSION['fecha_conexion']=$fila['ult_conexion'];
				$_SESSION['foto_perfil']=$fila['foto_perfil'];
				$_SESSION['descripcion']=$fila['descripcion'];
				header("Location: perfil_propio.php");
			}
			//La base de datos no se ha abierto correctamente. Cargamos en la variable $_SESSION['error_bd'] true para que se trate el error en registro_formulario.php.
			else{
				$_SESSION['error_bd']=true;
				header("Location: registro_formulario.php");
			}
		}
		//Alguna o algunas de las variables valen null, es decir, estaban vacías. Cargamos en la variable $_SESSION['incompletos'] true para que se trate el error en registro_formulario.php.
		else{
			$_SESSION['incompletos']=true;
			header("Location: registro_formulario.php");
		}
	}
	//El metodo usado no es POST. Cargamos en la variable $_SESSION['error_post'] true para que se trate el error en registro_formulario.php.
	else{
		$_SESSION['error_post']=true;
		header("Location: registro_formulario.php");
	}
?>