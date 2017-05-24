<?php
	$nick=isset($_POST['nick'])? $_POST['nick']: null;
	$clave=isset($_POST['contrasenia'])? $_POST['contrasenia']: null;
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		if($nick!=null && $clave!=null){
			$db=@mysqli_connect('localhost', 'root', '', 'guaunder');
			if($db){
				$sql="SELECT ID, NICK_US, NOMBRE_US, EDAD, CLAVE_US, UBICACION, EMAIL, FECHA_CREACION, ULT_CONEXION, FOTO_PERFIL, DESCRIPCION FROM USUARIO";
				$consulta=mysqli_query($db,$sql);
				$fila=mysqli_fetch_assoc($consulta);
				$encontrado=false;

				//Ponemos al principio todas las variables de error a false
				session_start();
				$_SESSION['no_encontrado']=false;
				$_SESSION['error_bd']=false;
				$_SESSION['incompletos']=false;
				$_SESSION['error_post']=false;

				//Buscamos el usuario en la bd
				while(!$encontrado && $fila){
					if($nick==$fila['NICK_US']){
						$encontrado=true;
					}
					else{
						$fila=mysqli_fetch_assoc($consulta);
					}
				}
				//No se encontro el nick del usuario
				if(!$encontrado){
					//Cargar variable de sesión para mostrar error pues no se encontro el usuario y/o contraseña
					$_SESSION['no_encontrado']=true;
					header("Location: pagina_logeo.php");
				}
				//Se encontró el nick del usuario
				else{
					//La clave coincide con el nick del usuario
					if($fila['CLAVE_US']==$clave){
						//Obtenermos el id del usuario
						$id=$fila['ID'];

						//El usuario se ha logeado de forma correcta, se guardan sus datos en variables de sesión
						//Iniciamos sesión con los datos del usuario

						$_SESSION['estado'] = 'Autenticado';
						$_SESSION['id']=$fila['ID'];
						$_SESSION['nick']=$fila['NICK_US'];
						$_SESSION['nombre']=$fila['NOMBRE_US'];
						$_SESSION['edad']=$fila['EDAD'];
						$_SESSION['ubicacion']=$fila['UBICACION'];
						$_SESSION['email']=$fila['EMAIL'];
						$_SESSION['fecha_creacion']=$fila['FECHA_CREACION'];
						$_SESSION['fecha_conexion']=$fila['ULT_CONEXIÓN'];
						$_SESSION['foto_perfil']=$fila['FOTO_PERFIL'];
						$_SESSION['descripcion']=$fila['DESCRIPCIÓN'];
						header("Location: pagPrincipal.html");
					}
					//La clave no coincide con el nick del usuario
					else{
						////Cargar variable de sesión para mostrar error pues no se encontro el usuario y/o contraseña
						$_SESSION['no_encontrado']=true;
						header("Location: pagina_logeo.php");
					}
				}
			}
			//Se produce un error al acceder a la bd
			else{
				//Cargar en variable sesión para mostrar error al abrir base de datos
				$_SESSION['error_bd']=true;
				header("Location: pagina_logeo.php");
			}
		}
		//Algun campo vale null
		else{
			//Cargar en variable sesión para mostrar que alguno de los campos están incompletos
			$_SESSION['incompletos']=true;
			header("Location: pagina_logeo.php");
		}
	}
	//El método no es POST
	else{
		//Cargar en variable sesión que se esperaba el método POST
		$_SESSION['error_post']=true;
		header("Location: pagina_logeo.php");
	}
?>