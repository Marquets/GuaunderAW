<?php
	//Nos aseguramos de que las variables no estan vacías, si están vacías las ponemos a null
	$nick_sin_comprobar=isset($_POST['nick'])? $_POST['nick']: null;
	$clave_sin_comprobar=isset($_POST['contrasenia'])? $_POST['contrasenia']: null;

	//Con htmlspecialchars convertimos el string que entra por parametro en caracteres especiales HTML, con trim borramos espacios en blanco del HTML y con strip_tags retiramos las etiquetas HTML y PHP del string. De esta forma impedimos que nos introduzcan un documento HTML y PHP que pueda provocar daños en nuestra aplicación.
	$nick=htmlspecialchars(trim(strip_tags($nick_sin_comprobar)));
	$clave=htmlspecialchars(trim(strip_tags($clave_sin_comprobar)));

	//Ponemos al principio todas las variables de error a false
	session_start();
	$_SESSION['no_encontrado']=false;
	$_SESSION['error_bd']=false;
	$_SESSION['incompletos']=false;
	$_SESSION['error_post']=false;

 	//Comprobamos que el método empleado es POST
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		//Comprobamos que las variables que hemos cogido del formulario no están vacías
		if($nick!=null && $clave!=null){
			//Conectamos a la base de datos
			$db=@mysqli_connect('localhost', 'root', 'root', 'guaunder');
			//Comprobamos que se ha conectado correctamente a la base de datos
			if($db){
				//Realizamos la consulta SQL
				$sql="SELECT ID, nick_us, nombre_us, fecha_nacimiento, clave_us, ubicacion, email, fecha_creacion, ult_conexion, foto_perfil, descripcion, num_matches FROM usuario";
				$consulta=mysqli_query($db,$sql);
				$fila=mysqli_fetch_assoc($consulta);
				$encontrado=false;

				//Buscamos el usuario en la bd, si lo encontramos ponemos la variable $encontrado a true y salimos del bucle.
				while(!$encontrado && $fila){
					if($nick==$fila['nick_us']){
						$encontrado=true;
					}
					else{
						$fila=mysqli_fetch_assoc($consulta);
					}
				}
				//No se encontro el nick del usuario
				if(!$encontrado){
					//Cargar variable de sesión para mostrar error pues no se encontro el usuario y/o contraseña en login_formulario.php
					$_SESSION['no_encontrado']=true;
					header("Location: login_formulario.php");
				}
				//Se encontró el nick del usuario
				else{
					//Comprobamos si la clave introducida concuerda con la del usuario, lo realizamos con password_verify, pues la clave esta encriptada.
					if(password_verify($clave, $fila['clave_us'])){

						//El usuario se ha logeado de forma correcta, se guardan sus datos en variables de sesión
						//Iniciamos sesión con los datos del usuario
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

						if($_SESSION['nick']=='admin')
							header("Location: usuariosregistrados.php");
						else
							header("Location: pagPrincipal.php");
					}
					//La clave no coincide con el nick del usuario
					else{
						//Cargar variable de sesión para mostrar error pues no se encontro el usuario y/o contraseña en login_formulario.php
						$_SESSION['no_encontrado']=true;
						header("Location: login_formulario.php");
					}
				}
			}
			//Se produce un error al acceder a la bd
			else{
				//Cargar en variable sesión para mostrar error al abrir base de datos en login_formulario.php
				$_SESSION['error_bd']=true;
				header("Location: login_formulario.php");
			}
		}
		//Algun campo del formulario estaba vacío
		else{
			//Cargar en variable sesión para mostrar que alguno de los campos están incompletos en login_formulario.php
			$_SESSION['incompletos']=true;
			header("Location: login_formulario.php");
		}
	}
	//El método no es POST, cargamos la variable $_SESSION['erro_post'] a true para que trate el error en login_formulario.php
	else{
		//Cargar en variable sesión que se esperaba el método POST
		$_SESSION['error_post']=true;
		header("Location: login_formulario.php");
	}
?>