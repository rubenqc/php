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
	<title>Gracias</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css" />
	<style>	
		#comprob{
			display: inline-block;
			position: absolute;
			height: 100%;
			width: 33px;
			left: 0;
			transform: translateX(-50%) scale(0.7);
		}
		@font-face {
		    font-family: 'ITC';
		    src: url('fonts/ITCAvantGardeStd-Bk.woff2') format('woff2'),
		        url('fonts/ITCAvantGardeStd-Bk.woff') format('woff');
		    font-weight: normal;
		    font-style: normal;
		}

		.itc{font-family: 'ITC';}

		input[type="number"]::-webkit-outer-spin-button,
		input[type="number"]::-webkit-inner-spin-button {
		    -webkit-appearance: none;
		    margin: 0;
		}

		input[type="number"] {
		    -moz-appearance: textfield;
		}

		body{
			background-image: url("img/bg-web3.jpg");
			background-repeat: no-repeat;
			background-size: cover;
			background-position-x:40%;
			background-color:#580502;
		}

		.registro {
			background-image: url("img/registro.png");
			background-size: 100% 100%;	
			background-color: rgb(0,0,0, 0.05);
			margin-top:20vh;
			background-repeat:no-repeat;
		}

		#txtdatos{
			color: white;
			font-size: 1.15em;
			font-weight: 500;
			padding-top: 15px;
			text-align: center;
		}
		.form-control{
			font-size:0.8rem;
		}

		.registro .enviar{
			font-size: 1.2em;
			background-color: #009fe1 !important;
		}
		.legal{
			margin-top:7%;
		}
		


		/* Media queries */
		
		@media(max-width: 546px){
			body{
				min-height: 100vh;
				background-image: url("img/bgmobile.jpg");
				background-repeat: no-repeat;
				background-position:top;
				background-size: contain;
			}
			#img-izquierda{
				height:85%;
			}
			#img-derecha{
				margin-top:40vh;
			}

			.container-fluid .text-justify{
				font-size: 8.5px !important;
			}
			.legal{
				margin-top:0;
			}
			.mobile{
				height:40px;		
			}
			.registro{
				margin-top:35vh;
				background-size: 100% 90%;
			}
		}
		@media(max-width: 767px) and (min-width:547px ){
			body{
				min-height: 100vh;
				background-image: url("img/bgmobile.jpg");
				background-repeat: no-repeat;
				background-position:top;
				background-size: 100% 90%;
			}
			#img-izquierda{
				
			}
			#img-derecha{
				margin-top:70vh;
			}
			.legal{
				margin-top:0;
			}
			.registro{
				margin-top:40vh;
			}
		}	
		@media(max-width: 991px) and (min-width:768px ){
			body{
				min-height: 100vh;
				background-image: url("img/bgmobile.jpg");
				background-repeat: no-repeat;
				background-size: 100% 100%;
			}
			#img-izquierda{
				margin-bottom:20vh;
			}
			#img-derecha{
				margin-top:90vh;
			}
			.legal{
				margin-top:0;
			}
			.registro{
				margin-top:40vh;
			}
		}
	</style>
	<link rel="stylesheet" href="css/big.css"/>
</head>
<body>
	<div class="container mx-auto">
		<div class="row pt-4">
			<div class="col-lg-6 d-none d-lg-block pt-5	">
				<img src="img/izquierda.png" id="img-izquierda" class="pt-3 pt-lg-0" style="width:95%">
			</div>
			<div class="col-lg-5 offset-lg-1 itc mt-5">	
				<div class="contenedor">
					<br  class="d-none b-lg-block"><br  class="d-none b-lg-block"><br  class="d-none b-lg-block"><br  class="d-none b-lg-block"><br  class="d-none b-lg-block"><br  class="d-none b-lg-block"><br  class="d-none b-lg-block">
					<div class="registro px-3 py-5">
						<br><br><br class="d-none d-sm-block"><br class="d-none d-sm-block">
						<p  class="text-center" style="color:white;font-size:50px;">Registro Exitoso</p>
						<p class="text-center" style="color:white;font-size:40px">Ya estás participando en el sorteo. ¡Mucha suerte!</p>
						<br><br><br><br>
					</div>
					<br class="d-none b-lg-block"><br class="d-none b-lg-block"><br class="d-none b-lg-block"><br class="d-none b-lg-block"><br class="d-none b-lg-block">
				</div>
				<br>
			</div>
		</div>
	</div>
	<div class="container-fluid legal" style="padding-bottom: 8px">
		<div class="row no-gutters d-lg-none mobile">
			<img src="img/logo-mobile.png" class="img-fluid mt-2 mx-auto">
		</div>
		<div class="row no-gutters">
			<div class="col-lg-11 mb-0 text-justify pl-lg-3 mt-1 my-2" style="font-size: 13px; color:#333; position: relative;bottom: -5px;color:white;">
				<br class="d-block d-lg-none">
				Promoción válida pagando con Tarjeta oh! Mastercard o Visa. Por tus consumo en restaurantes de comida china (Chifas) en Lima y/o provincia, del 01 al 30 de noviembre de 2018 obtendrás un 20% de devolución (máximo S/ 20 soles). Para participar de la promoción es necesario inscribirse en "landing promocional" www.chifasoh.pe. La devolución se hará en su próximo Estado de Cuenta de los meses de diciembre o enero. La devolución se hará a los clientes que consuman en restaurantes que tengan la denominación “Chifa” en su nombre comercial. Promoción exclusiva para clientes que reciban la comunicación a través de cualquier canal válido de Financiera oh!. No acumulable con otras promociones y/o descuentos.
			</div>
			<div class="col-lg-1 text-center d-none d-lg-block">
				<img src="img/logo-oh-web.png" class="img-fluid mt-2">
			</div>
		</div>
	</div>
	<div class="modal fade" id="modal-id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
					<h3 class="modal-title" id="exampleModalLabel">Políticas de Privacidad</h3>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
				</div>
				<div class="modal-body" style="font-size: 11.5px; text-align: justify;">
					Se informa que los datos personales proporcionados a FINANCIERA OH! S.A. quedan incorporados al  banco de datos de clientes de FINANCIERA OH! S.A., en el claro y expreso entendimiento que FINANCIERA OH! S.A. estará facultada a utilizar dicha información para efectos de la gestión de los productos y/o servicios solicitados y/o contratados incluyendo evaluaciones financieras, procesamiento de datos, formalizaciones contractuales, cobro de deudas, gestión de operaciones financieras y remisión de correspondencia, entre otros, la misma que podrá ser realizada a través de terceros.<br><br>
					Asimismo, garantizándose el pleno ejercicio de los derechos previstos en la Ley de Protección de Datos Personales (Ley N°29733) y su Reglamento (Decreto Supremo No. 003-2013-JUS) y/o de la norma que las sustituya o reglamente, el titular de los datos personales otorga también su consentimiento previo, inequívoco, expreso e informado a FINANCIERA OH! S.A. para utilizar y entregar, en tanto esta autorización no sea revocada, sus datos personales, incluyendo datos sensibles, que hubieran sido proporcionados directamente a FINANCIERA OH! S.A. y aquellos que hayan sido obtenidos de terceros o que pudieran encontrarse en fuentes accesibles para el público; a terceros, tales como proveedores de servidores y/o servicios informáticos (eventualmente ubicados en el extranjero), los mismos que se encuentran detallados en la sección TERCEROS, para el desarrollo y/o tratamiento de acciones y/o relaciones comerciales, la realización de estudios de mercado y de riesgo crediticio, elaboración de perfiles de compra y evaluaciones financieras, la remisión, directa o por intermedio de terceros (vía medio físico, electrónico o telefónico) de publicidad, información, obsequios, ofertas y/o promociones (personalizadas o generales) de productos y/o servicios de FINANCIERA OH! S.A. y/o de terceros con quienes mantenga relaciones comerciales y/o de otras empresas del Grupo Intercorp y sus socios estratégicos, entre las que se encuentran aquellas difundidas en el portal de la Superintendencia del Mercado de Valores (www.smv.gob.pe) así como en el portal www.intercorp.com.pe/es. Para tales efectos, el titular de los datos personales autoriza a FINANCIERA OH! S.A. la cesión, transferencia o comunicación de sus datos personales, a dichos terceros y empresas, y entre ellos.<br><br>
					El titular de datos personales podrá revocar la autorización para el tratamiento de sus datos personales en cualquier momento, de conformidad con lo previsto en la Ley de Protección de Datos Personales (Ley No. 29733) y su Reglamento (Decreto Supremo No. 003-2013-JUS) y/o de la norma que las sustituya o reglamente. Para ejercer este derecho, o cualquier otro previsto en dichas normas, incluyendo los de acceso, rectificación u oposición, el titular de datos personales podrá presentar su solicitud mediante el envío de una comunicación expresa y por escrito a FINANCIERA OH! S.A. que deberá ser entregada en cualquiera de los centros de atención al cliente y/o a la siguiente dirección de correo electrónico: “datoscliente.tarjetaoh@financierauno.pe”.
					<h3>Terceros</h3>
					Amazon Web Services.<br><br>
				</div>
			</div>
		</div>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script>
		$(function(){
			$('[data-toggle="popover"]').popover();

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
			$('[data-rel=popover]').popover({
				html: true,
				trigger: "hover"
			});
		});
	</script>
</body>
</html>