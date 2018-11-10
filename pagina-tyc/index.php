<?php

	$fuente = 'directo';

	if(isset($_GET['gclid'])){
		$fuente = 'google ads';
	}
	else if(isset($_GET['utm_source'])){
		
		$fuente = explode('_', strtolower($_GET['utm_source']));
		$fuente = $fuente[0];

		if($fuente == 'emaling' || $fuente == 'mail' || $fuente == 'email'){
			$fuente = 'emailing';
		}
	}

	$files = array_diff(scandir('img/slides'), array('.', '..'));

	natsort($files);

	$imagenes = '["'.implode('","', $files).'"]';

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>IQ Parodi - Oficinas en San Isidro</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css"/>
	<meta name="keywords" content="Iq Parodi, Oficinas Boutique, Oficinas en San Isidro, Proyecto IQ Parodi,Proyecto Oficinas Boutique">
	<meta name="description" content="¡Potencia tu imagen corporativa! El primer edificio de oficinas boutique en San Isidro">
	<style>

		html{
			background-color: #222;
		}

		body{
			background: linear-gradient(
					      rgba(0, 0, 0, 0.8), 
					      rgba(0, 0, 0, 0.8)
					    ), url(img/bg/bg.jpg?id=<?php echo uniqid(); ?>);

			background-size: cover;
			background-repeat: no-repeat;
		}

		.white{
			color: white;
		}

		p.white, h2.white{
			margin-bottom: 0;
		}

		#enviar{
			color: white;
			background-color: #f26f20;
			border-color: #f26f20;
			padding-left: 25px;
			padding-right: 25px;
			border-radius: 10px;
		}

		input.form-control{
			border-color: white;
			border-radius: 10px;
			background: transparent;
			color: white;
			font-size: 0.8rem;
			margin-bottom: 12px;
		}

		::-webkit-input-placeholder { /* Chrome/Opera/Safari */
		  color: white !important;
		  opacity: 1;
		}
		::-moz-placeholder { /* Firefox 19+ */
		  color: white !important;
		  opacity: 1;
		}
		:-ms-input-placeholder { /* IE 10+ */
		  color: white !important;
		  opacity: 1;
		}

		input[type=number]::-webkit-inner-spin-button, 
		input[type=number]::-webkit-outer-spin-button { 
			-webkit-appearance: none; 
			margin: 0; 
		}
		input[type='number'] {
		    -moz-appearance:textfield;
		}

		@media (max-width: 992px){
			h1{
				font-size: 2rem;
				margin-bottom: 0;
			}

			h2.h4{
				font-size: 0.9rem;
			}

			input.form-control{
				font-size: 0.7rem;
				margin-bottom: 10px;
			}

			p.white{
				line-height: 1.1;
				font-size: 0.9rem;
			}

			#logoo{margin-top: -10px}

		}
		@media (max-width: 768px){
			#logoo{margin-top: 50px}

			body{
				background: linear-gradient(
						      rgba(0, 0, 0, 0.7), 
						      rgba(0, 0, 0, 0.7)
						    ), url(img/slides/iq-parodi-1.jpg);
				background-size: cover;
				min-height: 100vh;
			}

		}
	</style>
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-75270961-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
		gtag('config', 'UA-75270961-1');

		var bgImageArray = <?php echo $imagenes; ?>,
		    base = "img/slides/",
		    secs = 7,
			a = 1;

		bgImageArray.forEach(function(img) {
		    new Image().src = base + img;
		});
	</script>
</head>
<body>
	<main class="container">
		<section class="row">
			<div class="col-lg-7 col-md-8">
				<div class="d-none d-md-block">
					<img src="img/slides/img_1.jpg" alt="IQ Parodi" class="img-fluid">
					<p class="white"><small>*imagenes referenciales</small></p>
					<br>
				</div>
			</div>
			<div class="col-lg-5 col-md-4 d-flex justify-content-center align-items-center">
				<div class="text-center">
					<img src="img/iq-logo.png" alt="IQ Logo" id="logoo">
					<h1 class="white">IQ Parodi</h1>
					<br>
					<h2 class="white h4">¡Potencia tu imagen corporativa!</strong></h2>
					<br>
					<p class="white"><small>Registrate para acceder a información exclusiva del proyecto.</small></p>
					<br>
					<form action="gracias.php" method="POST">
						<input type="text" required name="nombre" id="nombre" class="form-control" placeholder="Nombres">
						<input type="text" required name="apellido" id="apellido" class="form-control" placeholder="Apellidos">
						<input type="number" required name="dni" id="dni" class="form-control" placeholder="DNI"  maxlength="8" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
						<input type="number" required name="celular" id="cel" class="form-control" placeholder="Celular" min="900000000" max="999999999" title="Ingrese un número de celular">
						<input type="hidden" name="fuente" value="<?php echo $fuente; ?>">
						<input type="email" required class="form-control" name="mail" id="mail" placeholder="Correo electrónico">
						<button type="submit" id="enviar" class="btn btn-warning">
							<strong>¡Entérate!</strong>
						</button>
						<p class="d-md-none">&nbsp;</p>
					</form>
				</div>
			</div>
		</section>
	</main>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script>
		$(function(){

			if(sessionStorage.resend){
				$('button[type="submit"]').get(0).click();
				delete sessionStorage.resend;
			}
			else if('campo' in sessionStorage){
				alert("Ingrese un "+sessionStorage.campo+" válido");
				delete sessionStorage.campo;
			}			

			$('input').change(function(){ 
				this.value = $.trim(this.value); 
			}); 

			if(bgImageArray.length>1){
				setInterval(function(){
					
					b = bgImageArray[a%bgImageArray.length];

					$(".img-fluid").fadeTo(1000,0.30, function() {
		                $(".img-fluid").attr("src", "img/slides/"+b);
		            }).fadeTo(500,1);

					a++;
				}, 7000);
			}

		});
	</script>
</body>
</html>