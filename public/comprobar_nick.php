<?php
	if(isset($_GET['nick'])){
		//nerror_reporting(0);
		$nick=$_GET['nick'];
		if($nick=='')
			echo "error";
		else{
			$db=@mysqli_connect('localhost', 'root', '', 'guaunder');
			$sql="SELECT * FROM usuario WHERE nick_us='$nick'";
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