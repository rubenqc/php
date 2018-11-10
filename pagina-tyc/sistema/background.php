<?php 

	if(!empty($_FILES)){

		require 'ImageResizeGD.php';

		unlink('../img/bg/bgold.jpg');
		rename('../img/bg/bg.jpg', '../img/bg/bgold.jpg');

		$path = $_FILES['fondo']['name'];
		$ext = pathinfo($path, PATHINFO_EXTENSION);
		$real = '../img/bg/bgfull.'.$ext;

		move_uploaded_file($_FILES['fondo']['tmp_name'], $real);

		$red = min($_POST['ancho'], 1600); 

		$image = new ImageResizeGD($real);
		$image->resizeByWidth($red);
		$compress = $image->saveImageFile('../img/bg/bg', IMAGETYPE_JPEG, 70, '000000');

		unlink($real);

		echo '<script>alert("Se cambió el fondo con éxito"); window.location.replace("background.php");</script>';
		exit();

	}

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Administrador de Imagen de Fondo</title>
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/iconos.css">
	<style>
		.upload-btn-wrapper {
		  position: relative;
		  overflow: hidden;
		  display: inline-block;
		  cursor: pointer;
		}

		.upload-btn-wrapper input[type=file] {
		  font-size: 100px;
		  position: absolute;
		  left: 0;
		  top: 0;
		  opacity: 0;
		  cursor: pointer;
		}

		input[type=file]::-webkit-file-upload-button {
		    cursor: pointer; 
		}
	</style>
</head>
<body>
	<header>
		<h1 class="h3 text-center mt-2">Administrador de Background de Landing &nbsp; &nbsp;</h1>
		<hr>
	</header>
	<main class="container">
		<div class="row">
			<div class="col-6 text-right">
				<p class="mb-1"><img src="../img/bg/bgold.jpg?id=<?php echo uniqid(); ?>" alt="anterior" style="max-width:290px"></p>
				<p class="pr-md-5 mr-md-5">Fondo Anterior</p>
			</div>
			<div class="col-6 d-flex align-items-center">
				<p style="min-width: 300px; text-align:center;">
					<button class="btn btn-success btn-sm" id="reasign"><span class="icon-retweet"></span> Reasignar</button>
					<a href="../img/bg/bgold.jpg?id=<?php echo uniqid(); ?>" download class="btn btn-info btn-sm"><span class="icon-download"></span> Descargar</a>
					<br><br><br>
				</p>
			</div>
			<div class="col-6 text-right">
				<p class="mb-1"><img src="../img/bg/bg.jpg?id=<?php echo uniqid(); ?>" alt="actual" style="max-width:290px"></p>
				<p class="pr-md-5 mr-md-5">Fondo Actual</p>
			</div>
			<div class="col-6 d-flex align-items-center">
				<div class="text-center" style="min-width: 300px;">
					<div class="upload-btn-wrapper">
						<button class="btn btn-success btn-sm"><span class="icon-plus"></span> Cambiar</button>
						<form enctype="multipart/form-data" method="POST">
							<input type="file" name="fondo" id="fondo" accept="image/*" required>
							<input type="hidden" name="ancho" id="ancho">
						</form>
					</div>
					&nbsp;<a href="../img/bg/bg.jpg" download class="btn btn-info btn-sm" style="vertical-align: top;"><span class="icon-download"></span> Descargar</a>
					<p class="mb-0 pt-2">
						<ul class="text-left">
							<li><small><i>Tamaño máximo de imagen 4.5 MB</i></small></li>
							<li><small><i>Dimensión mínima del fondo 1300x580px</i></small></li>
							<li><small><i>El ancho de la imagen deberá ser como mínimo el doble del alto</i></small></li>
						</ul>
					</p>
				</div>
			</div>
		</div>
	</main>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>

		$(function(){

			var _URL = window.URL || window.webkitURL;

			$("#fondo").change(function(e) {

				var image, file;

			    if ((file = this.files[0])) {
			        image = new Image();

			        var tam = file.size;

			        image.onload = function() {

			        	if(this.width>=1300 && this.height>=580 && this.width/this.height>=2 && tam<=4718592){
			        		$("#ancho").val(this.width);
			        		$("form").get(0).submit();
			        	}
			        	else{
			        		$("form").get(0).reset();
			        		alert("La imagen no se ha subido, asegúrese de que cumpla con las especificaciones");
			        	}   
			        };
			        image.src = _URL.createObjectURL(file);
			    }
			});

			$("#reasign").click(function() {

				var _URL = window.URL || window.webkitURL;

				if(confirm("¿Desea reasignar la anterior imagen de fondo? Se cambiará el fondo actual por el anterior")){

					$.post('reasign.php', function(data) {
						alert(data);
						window.location.reload();
					});

				}
			});
		});
	</script>
</body>
</html>