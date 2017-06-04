<?php
	//Si la variable $_GET['correo'] no está vacía.
	if(isset($_GET['correo'])){
		//Guardamos el valor de $_GET['correo'] en una variable
		$correo=$_GET['correo'];
		//Si el valor de la variable es vacío hacemos enviamos error.
		if($correo=='')
			echo "error";
		//Si no esta vacía
		else{
			//Hacemos la consulta a la base de datos y comprobamos cual es el número de resultados
			$db=@mysqli_connect('localhost', 'root', 'root', 'guaunder');
			$sql="SELECT * FROM usuario WHERE email='$correo'";
			$consulta=mysqli_query($db,$sql);
			$numero=mysqli_num_rows($consulta);
			//Si el número de resultados es mayor a 0 enviamos existe
			if($numero>0){
				echo"existe";
			}
			//Sino mandamos exito
			else{
				echo"exito";;
			}
		}
	}
	//Si el valor de la variable es vacío hacemos enviamos error.
	else{
		echo"error";
	}


?>