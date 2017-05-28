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
			$db=@mysqli_connect('localhost', 'root', '', 'guaunder');
			//Comprobamos que la bd se haya abierto correctamente
			if($db){
				//Realizamos la consulta SQL
				$sql="INSERT INTO `usuario`(`ID`, `nick_us`, `nombre_us`, `fecha_nacimiento`, `clave_us`, `email`, `fecha_creacion`, `ult_conexion`) VALUES ('','$nick','$nombre_usuario','$fecha_nacimiento','$hashed_clave','$mail','$date','$date')";
				$consulta=mysqli_query($db,$sql);

				//El usuario se ha logeado de forma correcta, por lo tanto se guardan sus datos en variables de sesión
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