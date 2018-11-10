<?php 
	
if(!empty($_POST)){

	extract($_POST, EXTR_PREFIX_ALL, 'p');
				
	if($p_nombre!='' && $p_apellido!=''){

		function invalid_email($email) {return !filter_var($email, FILTER_VALIDATE_EMAIL);}

		if(!ctype_digit($p_dni) || strlen($p_dni)!=8 || $p_dni[0]==9){
			die('<script>sessionStorage.setItem("campo", "DNI o CE"); window.history.back();</script>');
		}
		
		else if(!ctype_digit($p_celular) || strlen($p_celular)!=9 || $p_celular[0]!=9){
			die('<script>sessionStorage.setItem("campo", "Celular"); window.history.back();</script>');
		}

		else if(invalid_email($p_mail)){
			die('<script>window.history.back(); sessionStorage.setItem("campo", "correo");</script>');
		}

		$mysqli = new mysqli('localhost', 'user', 'password', 'database');
		$mysqli->set_charset("utf8");
		$mysqli->query('SET time_zone = "-05:00"');

		$e_nombre = $mysqli->real_escape_string($p_nombre);
		$e_apellido = $mysqli->real_escape_string($p_apellido);
		$e_fuente = $mysqli->real_escape_string($p_fuente);

		$mysqli->query("INSERT INTO tabla VALUES(DEFAULT,'$e_nombre','$e_apellido','$p_dni','$p_celular','$p_mail',NOW(), '$e_fuente')");

		$error = $mysqli->errno;

		if($error == '1062'){
			session_start();
			$_SESSION['dummy'] = 'yolo';
			header("Location: /conoce-iqparodi/registrado.php",TRUE,303);
			exit();
		}

	}
	else{
		die('<script>sessionStorage.setItem("resend", true); window.history.back();</script>');
	}
}
else{
	header("Location: /conoce-iqparodi",TRUE,303);
	exit();
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>IQ Parodi</title>
	<meta name="robots" content="noindex">
	<meta name="googlebot" content="noindex">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css" />
	<style>

		html{background-color: #222;}

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
	</script>
</head>
<body>
	<!-- Google Code for Envío Formulario Conversion Page -->
	<script type="text/javascript">
	/* <![CDATA[ */
	var google_conversion_id = 821436345;
	var google_conversion_label = "gOuMCNbeloEBELm_2IcD";
	var google_remarketing_only = false;
	/* ]]> */
	</script>
	<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
	</script>
	<noscript>
	<div style="display:inline;">
	<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/821436345/?label=gOuMCNbeloEBELm_2IcD&guid=ON&script=0"/>
	</div>
	</noscript>
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
					<p class="white"><small>&nbsp;</small></p>
					<br>
					<div>
						<h3 class="text-center white">Registro exitoso.</h3>
						<p class="text-center white">Puedes descargar la información desde aquí</p>
						<br>
						<p class="text-center"><a href="parodi1.php"><img width="80" src="http://readerasturias.org/wp-content/uploads/2017/02/pdf-icon.png" alt="Descargar"></a></p>
						<h5 class="text-center" style="color: #e34043">¡Nuevo Contenido!</h5>
					</div>
				</div>
			</div>
		</section>
	</main>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script>
		$(function(){

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