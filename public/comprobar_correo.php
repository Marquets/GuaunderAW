<?php
	if(isset($_GET['correo'])){
		//nerror_reporting(0);
		$correo=$_GET['correo'];
		if($correo=='')
			echo "error";
		else{
			$db=@mysqli_connect('localhost', 'root', '', 'guaunder');
			$sql="SELECT * FROM usuario WHERE email='$correo'";
			$consulta=mysqli_query($db,$sql);
			$numero=mysqli_num_rows($consulta);
			if($numero){
				echo"existe";
			}
			else{
				echo"exito";;
			}
		}
	}
	else{
		echo"error";
	}


?>