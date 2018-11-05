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
	<title>Modelo4</title>
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

		input[type="number"]::-webkit-outer-spin-button,
		input[type="number"]::-webkit-inner-spin-button {
		    -webkit-appearance: none;
		    margin: 0;
		}

		input[type="number"] {
		    -moz-appearance: textfield;
		}

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
			color:#00A2E7;
		}

		#txtdatos{
			color: white;
			font-size: 1.15em;
			font-weight: 500;
			padding-top: 15px;
			text-align: center;
		}

		.registro .enviar{
			font-size: 1.2em;
			background-color: #009fe1 !important;
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
									<input type="email" name="mail" class="form-control" placeholder="Email" required />
									<input type="hidden" name="fuente" value="<?php echo $fuente; ?>">
								</div>
								<div class="form-group col-10 offset-1 text-center">
									<label style="color: white; margin-bottom: 0; font-size: 0.8rem"><input type="checkbox" value="1" name="acepto" required> &nbsp;He leído y <a data-toggle="modal" href="#modal-id" style="border-bottom: 1px dashed white; color: white !important; text-decoration: none;">autorizo el tratamiento de datos personales</a></label>
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
	<div class="container mx-auto" style="margin-bottom: 12px">
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
					<br><br><h3>Terceros</h3>
					Upcloud Cloud Services.<br><br>
				</div>
			</div>
		</div>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>
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

		});
	</script>
</body>
</html>