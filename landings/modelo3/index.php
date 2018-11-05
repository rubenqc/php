<?php

	$fuente = 'directo';

	if(isset($_GET['gclid'])){
		$fuente = 'google ads';
	}
	else if(isset($_GET['utm_source'])){
		$fuente = explode('_', strtolower($_GET['utm_source']));
		$fuente = $fuente[0];
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Modelo3</title>
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
			background-image: url("img/bg-web1.jpg");
			background-repeat: no-repeat;
			background-size: cover;
			background-position:top;
			background-color:#00616F;
		}

		.registro {
			background-color: rgb(255,255,255, 0.15);
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
		.mobile{
					
		}


		/* Media queries */
		
		@media(max-width: 546px){
			body{
				min-height: 100vh;
				background-image: url("img/bg-mobile1.png");
				background-repeat: no-repeat;
				background-position:top;
				background-size: contain;
			}
			#img-izquierda{
				height:85%;
			}
			#img-derecha{
				margin-top:35vh;
			}

			.container-fluid .text-justify{
				font-size: 8.5px !important;
			}
			.legal{
				margin-top:0;
			}
		}
		@media(max-width: 767px) and (min-width:547px ){
			body{
				min-height: 100vh;
				background-image: url("img/bg-mobile1.png");
				background-repeat: no-repeat;
				background-position:top;
				background-size: 100% 90%;
			}
			#img-izquierda{
				
			}
			#img-derecha{
				margin-top:55vh;
			}
			.legal{
				margin-top:0;
			}
		}
		@media(max-width: 991px) and (min-width:768px ){
			body{
				min-height: 100vh;
				background-image: url("img/bg-mobile1.png");
				background-repeat: no-repeat;
				background-size: 100% 100%;
			}
			#img-izquierda{
				margin-bottom:20vh;
			}
			#img-derecha{
				margin-top:80vh;
			}
			.legal{
				margin-top:0;
			}
		}
	</style>
	<link rel="stylesheet" href="css/big.css"/>
</head>
<body>
	<div class="container mx-auto">
		<div class="row pt-4">
			<div class="col-lg-5 offset-lg-7 itc mt-5">	
				<div class="contenedor">
					<div class="promocion text-center">
						<img src="img/titular.png" id="img-derecha" class="pt-3 pt-lg-0" style="width:90%">
					</div>
					<br>
					<div class="registro">
						<p id="txtdatos">Ingresa tus datos para participar:</p>
						<form method="post" action="gracias.php">
							<div class="row">
								<div class="form-group col-10 offset-1">
									<input type="text" name="nombre" class="form-control" placeholder="Nombres" required/>
								</div>
								<div class="form-group col-10 offset-1">
									<input type="text" name="apellido" class="form-control" placeholder="Apellidos" required/>
								</div>
								<div class="form-group col-10 offset-1">
									<input type="number" name="dni" maxlength="8" class="form-control" placeholder="DNI" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" title="Ingrese un DNI válido" required/>
								</div>
								<div class="form-group col-10 offset-1">
									<input type="number" name="cel" class="form-control" placeholder="Celular" min="900000000" max="999999999" title="Ingrese un celular válido" required />
								</div>
								<div class="form-group col-10 offset-1">
									<input type="email" name="mail" class="form-control" placeholder="Correo electrónico" required />
									<input type="hidden" name="fuente" value="<?php echo $fuente; ?>">
								</div>
								<div class="form-group col-10 offset-1 text-center">
									<label style="color: white; margin-bottom: 0; font-size: 0.8rem"><input type="checkbox" value="1" name="acepto" required> &nbsp;He leído y autorizo el <a data-toggle="modal" href="#modal-id" style="border-bottom: 1px dashed white; color: white !important; text-decoration: none;">tratamiento de datos personales.</a></label>
								</div>
								<div class="form-group col-10 offset-1">
									<button type="submit" class="btn btn-primary btn-lg btn-block enviar"><b>Participar</b></button>
								</div>
							</div>
						</form>
					</div>
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
			<div class="col-lg-1 text-center d-none d-lg-block">
				<img src="img/logo-oh-web.png" class="img-fluid mt-2">
			</div>
			<div class="col-lg-11 mb-0 text-justify pl-lg-3 mt-1" style="font-size: 15px; color:#333; position: relative;bottom: -5px;color:white;">
				<br class="d-block d-lg-none">
				Promoción válida pagando con Tarjeta oh! Mastercard o Visa. Por tus consumo en comercios asociados en Lima y/o provincia del 01/11/18 al 30/11/18. Ganarás una (01) opción para el sorteo por cada compra mayor a S/ 30, Para participar del sorteo es necesario inscribirse en landing. El sorteo se realizará el 10 de diciembre ante notario público de Lima en las oficinas de Financiera oh! Promoción exclusiva para clientes que reciban la comunicación a través de cualquier canal válido de Financiera oh! No participan en la promoción los consumos en Plaza Vea, Oechsle y/o Promart.
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