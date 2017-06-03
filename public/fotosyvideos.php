<?php
    session_start();
    if (!isset($_SESSION['nick'])) {
        header("Location: index.html");
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Fotos y Vídeos</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="img/icono.png">
	<link rel="stylesheet" href="css/cssPrincipal.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery-3.2.0.min.js"></script>
	<script>
		$(document).ready(function(){
			$( "#header" ).load('loginHome.html');
		});
	</script>
</head>
<body>

	<div id="header"></div>

  <div class="container">

    <div class="row">

    <div class="modal fade" id="modal-foto-video" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" aria-label="close" data-dismiss="modal" ><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel1">Subir Archivo</h4>
                    </div>
                    <div class="modal-body">
                        <form action=<?php echo "fotosyvideos.php?nick=" . $_GET["nick"]?> method="post" enctype="multipart/form-data">
                            <input type="file" name="fileToUpload">
                            <br>
                            <input type="submit" value="Upload File" name="submit">
                        </form>
                        <?php
                        if (isset($_GET["nick"])) {
                            $db = @mysqli_connect('localhost','root','root','guaunder');
                            if ($db) {


                                if(isset($_FILES["fileToUpload"]["name"])) {
                                    $uploadOk = 1;
                                    $target_dir = "img/";
                                    $target_file = $target_dir . $_FILES["fileToUpload"]["name"];
                                    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                                    if ($_FILES["fileToUpload"]["size"] > 500000000) {
                                        echo "Sorry, your file is too large.";
                                        $uploadOk = 0;
                                    }

                                    if( $imageFileType != "mp4" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
                                        echo "Sorry, only JPG, JPEG,,PNG & MP4 files are allowed.";
                                        $uploadOk = 0;
                                    }

                                    if($uploadOk == 1){
                                        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
                                        $ruta = '"'. $target_file . '"';
                                        $usuario = $_GET['nick'];
                                        $sql=" SELECT ID from usuario WHERE nick_us = '$usuario'";
                                        $consulta = mysqli_query($db, $sql);
                                        $cat = mysqli_fetch_assoc($consulta);
                                        $id = $cat['ID'];
                                        if($imageFileType == "mp4") {
                                            $sql="INSERT INTO multimedia(ID,referencia,tipo) VALUES ('$id','$ruta','video')";
                                            $consulta = mysqli_query($db, $sql);
                                        }
                                         if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg") {
                                            $sql=" INSERT INTO multimedia(ID,referencia,tipo) VALUES ('$id','$ruta','foto')";
                                            $consulta = mysqli_query($db, $sql);
                                        }
                                        header("Refresh:0");
                                    }

                                }

                            }
                            else {
                                printf(
                                    'Error %d: %s.<br />',
                                    mysqli_connect_errno(),mysqli_connect_error());
                            }
                            @mysqli_close($db);
                        }

                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <h1 class="page-header">
            <?php
            if ($_SESSION["nick"] == $_GET["nick"]) {
                echo "Mis Fotos y Videos   ";
                echo '<span title="Subir Nuevo Archivo" class="glyphicon glyphicon-upload" aria-hidden="true" data-toggle="modal" data-target="#modal-foto-video"></span>';
            }
            else {
                echo "Fotos y Videos";
            }
            ?>
              </h1>

        </div>

        <?php

        if(isset($_GET["nick"])) {

            $db = @mysqli_connect('localhost','root','root','guaunder');
            if ($db) {
                    /*echo 'Conexión realizada correctamente.<br />';
                    echo 'Información sobre el servidor: ',
                    mysqli_get_host_info($db),'<br />';
                    echo 'Versión del servidor: ',
                    mysqli_get_server_info($db),'<br />';*/


                    $usuario = $_GET['nick'];
                    $sql="SELECT referencia, tipo FROM usuario  NATURAL JOIN multimedia WHERE nick_us = '$usuario'";
                    $consulta = mysqli_query($db, $sql);

                    while ($cat = mysqli_fetch_assoc($consulta)) {
                        if( $cat["tipo"] == "foto") {
                            echo '<div class="col-lg-3 col-md-4 col-xs-6 thumb">';
                            echo  '<a class="thumbnail" href="#">';
                            echo  '<img title="Foto" class="img-responsive tam" src=' . $cat["referencia"] . ' alt="">';
                            echo  '</a>';
                            echo  '</div>';
                        }
                        else {
                            echo '<div class="col-lg-3 col-md-4 col-xs-6 thumb">';
                            echo  '<a class="thumbnail" href="#">';
                            echo '<video title="Video" controls class="tam">';
                            echo '<source src= '. $cat["referencia"] .' type="video/mp4">';
                            echo ' </video>';
                            echo  '</a>';
                            echo  '</div>';
                        }

                    }

                }
                else {
                    printf(
                        'Error %d: %s.<br />',
                        mysqli_connect_errno(),mysqli_connect_error());
                }
            }




            ?>
        </div>

        <div id="footer"></div>

        <script>
          $(document).ready(function(){
             $( "#footer" ).load('footer.html');
         });
     </script>

     <script src="js/bootstrap.min.js"></script>
     <script src="js/guaunder.js"></script>
 </body>

 </html>
