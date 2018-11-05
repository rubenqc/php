<?php 

	if(!empty($_POST)){
		
		extract($_POST, EXTR_PREFIX_ALL, 'p');
				
		if($p_nombre!='' && $p_apellido!=''){

			function invalid_email($email) {return !filter_var($email, FILTER_VALIDATE_EMAIL);}
			
			if(!ctype_digit($p_dni) || strlen($p_dni)!=8 || $p_dni[0]==9){
				die('<script>sessionStorage.setItem("campo", "DNI"); window.history.back();</script>');
			}

			else if(!ctype_digit($p_cel) || strlen($p_cel)!=9 || $p_cel[0]!=9){
				die('<script>sessionStorage.setItem("campo", "Celular"); window.history.back();</script>');
			}

			else if(invalid_email($p_mail)){
				die('<script>window.history.back(); sessionStorage.setItem("campo", "correo");</script>');
			}

			$mysqli = new mysqli("localhost", "root", "contraseña", "nombreDataBase");
			$mysqli->set_charset('utf8');
			$mysqli->query("INSERT INTO tabla VALUES (DEFAULT,'$p_nombre','$p_apellido','$p_dni','$p_cel','$p_mail',NOW(),'$p_fuente')");
		}
		else{
			die('<script>sessionStorage.setItem("resend", true); window.history.back();</script>');
		}
	}
	else{
		header("Location: /",TRUE,303);
	} 	

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Music Sessions</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css" />
	<style>	

		@font-face {
		    font-family: 'ITC';
		    src: url('fonts/ITCAvantGardeStd-Bk.woff2') format('woff2'),
		        url('fonts/ITCAvantGardeStd-Bk.woff') format('woff');
		    font-weight: normal;
		    font-style: normal;
		}

		.itc{font-family: 'ITC';}

		body{
			background-image: url("img/bg.jpg");
			background-repeat: no-repeat;
			background-size: cover;
		}
		.contenedor{
			padding-top: 50px;
		}	
		.registro {
			background-color: rgb(204, 204, 204, 0.3);
		}
		#txtdatos{
			color: #6e6e6e;
			font-size: 1.15em;
			font-weight: 500;
			padding-top: 15px;
			text-align: center;
		}
		.logo1 img{
			width: 20%;
		}
		/* Media queries */
		@media(min-width: 1450px){
			.container{
				width: 1400px;
				max-width:1400px;
			}
		}

		@media(max-width: 1500px) and (min-width: 992px){

			body{
				min-height: 100vh;
				background-size: 100% 100%;
			}

		}
	</style>
</head>
<body>
	<div class="container mx-auto">
		<div class="row">
			<div class="col-lg-6 d-flex align-items-center mt-5 mt-md-0">
				<img src="img/izquierda.png" class="w-100" alt="Juan Luis Guerra">
			</div>
			<div class="col-lg-5 offset-lg-1 itc">	
				<div class="contenedor">
					<div class="promocion">
						<img src="img/titular6.png" class="w-100">
					</div>
					<br><br>
					<div class="registro text-white">
						<br>
						<h1 class="text-center">Registro Exitoso</h1>
						<h2 class="text-center">Hemos recibido tus datos correctamente</h2>
						<br>
					</div>
					<div id="logooh">
						<!-- <p class="text-center" style="font-size: 0.8rem">*La reposición por robo o pérdida tiene un costo de S/10.00 <br> 
							*Devolución maxima de S/20.00</p> -->
						<p>&nbsp;</p>
					</div>
				</div>
				<br>
			</div>
		</div>
	</div>
	<div class="container mx-auto mb-5">
		<div class="row">
			<div class="col-lg-2 text-center">
				<br class="d-block d-lg-none">
				<img src="img/web/logo-oh1.png">
				<br class="d-block d-lg-none">
			</div>
			<div class="col-lg-10 mb-0 text-justify text-white" style="font-size: 11px;">
				<br class="d-block d-lg-none">
				Promoción exclusiva con Tarjeta oh! Mastercard, válida entre el 11 de octubre al 23 de octubre del 2018. Por cada compra mayor o igual a S/ 30 ganas una opción para participar del sorteo de 20 entradas dobles en zona Bilirrubima. Fecha del concierto: 27 de octubre de 2018, en el Jockey Club – La Pelousse. Inicio del concierto: 8:30 p.m. Fecha del sorteo: 19 de octubre a las 4:00 p.m. en las oficinas de Financiera oh!. Participan del sorteo aquellos clientes que recibieron la comunicación y se inscribieron en el landing de la promoción: https://ohdescuentos.com/concierto-jlguerra Mastercard International Incorporated ("Mastercard") solamente está actuando como patrocinador de esta promoción mientras que SONY MUSIC ENTERTAINMENT PERU S.A. ("Sony") es el único y exclusivo responsable por organizar, brindar y supervisar la promoción. Financiera OH es el único responsable de realizar la promoción y elegir los ganadores de la promoción mientras que Mastercard  International incorporated (“Mastercard”) sólo participa como auspiciador, otorgando las entradas al concierto a los ganadores elegidos por Financiera OH. Respecto al concierto Mastercard Music Sessions, Mastercard solamente está actuando como auspiciador del concierto mientras que SONY MUSIC ENTERTAINMENT PERU S.A. ("Sony") es el único y exclusivo responsable por organizar, brindar y supervisar el concierto.
			</div>
		</div>
	</div>
</body>
</html>