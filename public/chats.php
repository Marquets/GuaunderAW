<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Chats</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="img/icono.png">
	<link rel="stylesheet" type="text/css" href="css/cssPrincipal.css"/>
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
	<script src="js/jquery-3.2.0.min.js"></script>
	<script>
		$(document).ready(function(){
			$( "#header" ).load('loginHome.html');
		});
	</script>
</head>
<body>
	<div id="header"></div>

	<div class="center-block" id="chat-box">
		<div class="panel panel-default">
			<div class="panel-heading container-fluid">
				<div class="row">
					<div class="col-md-2 col-sm-3 col-xs-5">
						<span class="heading-medium"> Chats </span><span class="badge">2</span>
					</div>
					<div class="col-md-8 col-sm-7 col-xs-4"></div>
					<div class="col-md-2 col-sm-2 col-xs-2">
						<div data-toggle="modal" data-target="#nuevoMensajeModal">
							<a role="button" class="btn btn-default" id="nuevo-chat" href="#" data-toggle="tooltip" data-placement="top" title="Nuevo chat">
								<span class="glyphicon glyphicon-plus-sign" id="nuevo-chat-icono"></span>
							</a>
						</div>

						<div id="nuevoMensajeModal" class="modal fade modalsChats container-fluid" role="dialog">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
								    	<button type="button" class="close" data-dismiss="modal">&times;</button>
								    	<h4 class="modal-title">Nuevo mensaje</h4>
								  	</div>
									<div class="modal-body">
										<form class="form-horizontal" method="post" action="newMessage.php">
											<div class="form-group">
                                                <label class="control-label col-sm-3" for="select_destinatary">Para:</label>
                                                <div class="col-sm-9">
                                                    <select type="select" class="form-control" id="select_destinatary" name="select_destinatary">
                                                    	<?php
                                                    		$db=@mysqli_connect('localhost', 'root', '', 'guaunder');
                                                    		$sql="select g1.us_like as g1Like, g1.us_target, g1.super_like from matches_guau g1, matches_guau g2 where g1.us_like=g2.us_target and g1.us_target=g2.us_like and g1.us_like <> 'samgar01'";
                                                    		$consulta=mysqli_query($db,$sql);

                                                    		echo '<option value="" disabled selected>Selecciona el destinatario</option>';
                                                    		while ($matches = mysqli_fetch_assoc($consulta)) {
                                                    			echo "<option value=".$matches['g1Like'].">".$matches['g1Like']."</option>";
                                                    		}
                                                    		@mysqli_close($db);
                                                    	?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-3" for="message_content">Mensaje:</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" id="message_content" name="message_content" placeholder="Escribe el mensaje" rows="3"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-8 col-sm-2">
                                                    <button type="submit" id="enviarMensaje" class="btn btn-success" disabled="disabled">Enviar!</button>
                                                </div>
                                                <div class="col-sm-2">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                                </div>
                                            </div>
                                        </form>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
			<div class="panel-body chat-convers container-fluid">
			<?php
				$db=@mysqli_connect('localhost', 'root', '', 'guaunder');
				//$sql="select distinct Remitente from mensajes where Destinatario=".$_SESSION['nick'];
				$sql="select distinct Remitente from mensajes where Destinatario='samgar01'";
				$consulta=mysqli_query($db,$sql);

				while ($chats = mysqli_fetch_assoc($consulta)){
					$remitente = $chats['Remitente'];
			?>
					<div class="chat-conver msg-new" data-id="<?php echo $remitente; ?>" data-toggle="modal" data-target="#chatModal">
						<div class="col-md-3 col-xs-4">
							<span class="negrita nick">
								<?php
									echo $remitente;
								?>
							</span>
						</div>
						<div class="col-md-6 col-xs-4">
							<span class="msg-preview-new">
								<?php
									$sql2="select Cuerpo, fecha from mensajes where Destinatario='samgar01' and Remitente='".$chats['Remitente']."'	 order by fecha desc limit 1";
									$consulta2=mysqli_query($db,$sql2);
									$ultMensaje = mysqli_fetch_assoc($consulta2);
									echo utf8_encode($ultMensaje['Cuerpo']);
								?>
							</span>
						</div>
					</div>
			<?php
				}
			?>
					<div id="chatModal" class="modal fade modalsChats container-fluid" role="dialog">
						<div class="modal-dialog">
					    	<div class="modal-content">
					    		<div class="modal-header">
					        		<button type="button" class="close" data-dismiss="modal">&times;</button>
					        		<h4 class="modal-title"></h4>
					      		</div>
					      		<div class="modal-body">

					    		</div>
					    		<div class="modal-footer">
					      			<button type="button" class="btn btn-success" data-dismiss="modal">Responder</button>
					        		<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
					    		</div>
					    	</div>
						</div>
					</div>
			</div>
			<div class="panel-footer">
				<span>Conectado como: Samuel</span>
			</div>
		</div>
	</div>

	<div id="footer"></div>

	<script>
		$(document).ready(function(){
			$( "#footer" ).load('footer.html');
		});
	</script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chats.js"></script>

</body>
</html>




