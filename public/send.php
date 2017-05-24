<!DOCTYPE HTML>
<html>
	<body>
		<?php 
			$para = "guaunderinfo@gmail.com"; 
			$asunto = $_POST['asunto'];
			$cuerpo = $_POST['mensaje']; 
			$name = $_POST['name'];
			$mail = $_POST['mail'];

			$headers =  'MIME-Version: 1.0' . "\r\n"; 
			$headers .= 'From: '.$name.'<'.$mail.'>' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
			
			mail($para, $asunto, utf8_decode($cuerpo), $headers); 

			header('Location: index.html');
		?>
	</body>
</html>