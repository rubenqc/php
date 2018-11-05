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
	<title>Vacaciones Inkaclub</title>
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
			background-image: url("img/bg-new.jpg");
			background-repeat: no-repeat;
			background-size: cover;
			background-position:center;
		}

		.registro {
			background-color: rgb(0,162,231, 0.2);
			color:#00A2E7;
		}

		#txtdatos{
			color: #6c757d;
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

		/* Media queries */
		
		@media(max-width: 546px){
			body{
				min-height: 100vh;
				background-image: url("img/bg-mobile.jpg");
				background-repeat: no-repeat;
				background-position:top;
				background-size: contain;
			}
			#img-izquierda{
				height:85%;
			}
			#img-derecha{
				margin-top:22vh;
			}

			.container-fluid .text-justify{
				font-size: 8.5px !important;
			}
		}
		@media(max-width: 767px) and (min-width:546px ){
			body{
				min-height: 100vh;
				background-image: url("img/bg-mobile.jpg");
				background-repeat: no-repeat;
				background-position:top;
				background-size: 100% 90%;
			}
			#img-izquierda{
				
			}
			#img-derecha{
				margin-top:35vh;
			}
		}
		@media(max-width: 974px) and (min-width:768px ){
			body{
				min-height: 100vh;
				background-image: url("img/bg-mobile.jpg");
				background-repeat: no-repeat;
				background-size: 100% 100%;
			}
			#img-izquierda{
				margin-bottom:20vh;
			}
			#img-derecha{
				margin-top:20vh;
			}
		}
		@media(min-width:975px ){
			.registro{
				margin-bottom:5vh;
			}
		}
	</style>
	<link rel="stylesheet" href="css/big.css"/>
</head>
<body>
	<div class="container mx-auto">
		<div class="row pt-4">
			<div class="col-lg-6 d-flex align-items-start mt-md-0 pt-1 justify-content-center">
				<img src="img/izquierda-new.png" class="d-block" id="img-izquierda"  style="width:90%">
			</div>
			<div class="col-lg-5 offset-lg-1 itc">	
				<div class="contenedor">
					<div class="promocion text-center">
						<img src="img/titular6-new.png" id="img-derecha" class="pt-3 pt-lg-0" style="width:90%">
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
								<div class="form-group col-10 offset-1 position-relative" >
									<a>
										<i class="menu-icon fa fa-picture-o fa-3x" data-rel="popover" title="<strong >Numero de Comprobante</strong>" data-placement="top" data-content="<img src='img/ejemplo.png' width=100% height=100%>">
										<img src="img/info.png" alt="Información" id="comprob">
										</i>
									</a>
									<input type="text" name="comprob" maxlength="12" class="form-control d-inline-block" placeholder="Número de comprobante"  required />
								</div>
								<div class="form-group col-10 offset-1 text-center">
									<label style="color: #6c757d; margin-bottom: 0; font-size: 0.8rem"><input type="checkbox" value="1" name="acepto" required> &nbsp;He leído y acepto los <a data-toggle="modal" href="#modal-id" style="border-bottom: 1px dashed #6c757d; color: #6c757d !important; text-decoration: none;">términos y condiciones.</a></label>
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
	<div class="container-fluid" style="padding-bottom: 8px">
		<div class="row no-gutters">
			<div class="col-lg-1 text-center">
				<img src="img/web/logo-oh1.png" class="img-fluid mt-2">
			</div>
			<div class="col-lg-11 mb-0 text-justify pl-lg-3" style="font-size: 8.67px; color:#333; position: relative;bottom: -5px">
				<br class="d-block d-lg-none">
				Por cada S/ 20 de compra en Inkafarma del 15 de octubre al 15 de noviembre de 2018 ganas 1 opción para participar del sorteo por uno de los 10 paquetes familiares a Cusco, Máncora o Tarapoto, y si pagas con tu Tarjeta oh! multiplicas por 5 tus opciones. Exclusivo para clientes que se inscriban. Aplica también para Delivery, App Inkafarma Móvil y web www.inkafarma.pe. No participan menores de edad, personas jurídicas ni colaboradores o familiares de Inkafarma o Financiera oh!. Fecha del sorteo virtual y publicación de resultados: 20 de noviembre de 2018 a las 4:00 p.m. Anunciaremos a los ganadores a través de la web www.inkafarma.com.pe y www.vacacionesoh.pe. Una misma persona no podrá ser ganadora más de una vez. La entrega de premios se coordinará durante los 7 días hábiles después del sorteo. Si el cliente ganador no se manifiesta ante las notificaciones de entrega del premio dentro de 60 días hábiles de realizado el sorteo se procederá con la anulación del premio y perderá su calidad de ganador, no habiendo opción a reclamo. Condiciones de Premio: 10 paquetes familiares. Cada paquete familiar está cotizado por S/ 3,000 y será entregado al cliente como vale de servicio vía email, para que pueda utilizarlo en un paquete de viaje a Cusco, Máncora, Tarapoto o a cualquier destino a nivel nacional a elección del ganador siempre que esté valorizado en un máximo de S/ 3,000 por la agencia Nuevo Mundo. Válido para hacer efectivo el viaje hasta el 20 de noviembre de 2019. Solo canjeable con Nuevo Mundo Viajes. No se permite ampliación de vigencia una vez cumplida la fecha indicada. No se permite cambio del valor de este premio por dinero en efectivo. El paquete familiar está cotizado en base a boletos aéreos para 4 personas, más alojamiento en destino durante fechas no festivas ni feriados calendarios ni eventos especiales en el destino, consultando previamente disponibilidad con Nuevo Mundo Viajes. El ganador debe consumir el total del vale en una sola compra y no podrá hacer cambios una vez hecha la reserva. Si el monto de la cotización del paquete al destino seleccionado excede los S/ 3,000 el cliente deberá pagar el monto excedente, y si el monto de compra es menor a S/3,000 podrá comprar algo adicional para llegar al monto, o de lo contrario perderá el valor restante y no habrá derecho a reclamos. No es reembolsable ni transferible. No es válido para la acumulación de millas aéreas. Condiciones y Restricciones Financiera oh!: No participan clientes con tarjetas y cuentas bloqueadas, refinanciadas, con mora o problemas crediticios. Inkafarma promueve el uso responsable de los productos farmacéuticos y dispositivos médicos. Para mayor información sobre Términos, Condiciones y Tarifario de la Tarjeta oh! vigente visita www.tarjetaoh.com.pe. Información difundida de acuerdo a la ley N°28587 y Res. SBS N° 8181-2012.
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
					<p class="h5">Programa Inkaclub:</p><br>
					El cliente, autoriza a Inretail Pharma S.A., con R.U.C. Nº 20331066703, con domicilio en Calle Víctor Alzamora N° 147, La Victoria, Lima, y a cualquiera de sus subsidiarias (“INKAFARMA“), a afiliarlo al Programa Inkaclub para obtener puntos al adquirir productos o servicios en INKAFARMA, y obtener, después, un descuento para la compra de otros productos ofertados en INKAFARMA o de productos y/o servicios brindados por terceras empresas con las que INKAFARMA tenga convenios (el “Programa”). Más información del programa, condiciones y/o restricciones en el folleto que usted declara recibir y en <a href="https://www.inkafarma.com.pe">www.inkafarma.com.pe</a>; las mismas podrán ser modificadas de forma unilateral por INKAFARMA.
					<br><br><p class="h5">Autorización para el tratamiento de Datos Personales:</p>
					La información proporcionada al inscribirse y participar en el programa y aquella obtenida con anterioridad por cualquier medio (público o de terceros), incluyendo su historial de compras en INKAFARMA (pasadas, presentes y futuras), así como las que se brinden a través de cualquier medio de venta, es considerada datos personales. Usted nos da su consentimiento libre, previo, expreso e informado, de forma indefinida para conservar de manera segura y tratar sus datos personales en nuestro banco de datos “CLIENTES” (código N° 970), con la finalidad de ejecutar el Programa, realizar estudios de mercado, elaborar perfiles de compra, ofrecerle promociones, ofertas, descuentos, publicidad, obsequios, información de diversa índole, inclusive de otras empresas del Grupo Intercorp y sus socios estratégicos, entre las que se encuentran aquellas difundidas en el portal web <a href="https://www.smv.gob.pe">https://www.smv.gob.pe</a> y en <a href="https://www.intercorp.com.pe/es">https://www.intercorp.com.pe/es</a>. El CLIENTE autoriza la transferencia de sus datos personales, a nivel nacional y/o transfronterizo. El CLIENTE podrá ejercitar los derechos de información, acceso, actualización, rectificación, inclusión, cancelación, oposición y tratamiento objetivo que le confiere la Ley No. 29733, y su Reglamento; a través del portal web <a href="https://www.inkafarma.com.pe/arco">https://www.inkafarma.com.pe/arco</a> (FORMATO ARCO).
					<br><br><p class="h5">Tarjeta oh!:</p>
					Se informa que los datos personales proporcionados a FINANCIERA OH! S.A. quedarán incorporados al banco de datos de clientes de FINANCIERA OH! S.A., en el claro y expreso entendimiento que FINANCIERA OH! S.A. estará facultada a utilizar dicha información para efectos de la gestión de los productos y/o servicios solicitados y/o contratados incluyendo evaluaciones financieras, procesamiento de datos, formalizaciones contractuales, cobro de deudas, gestión de operaciones financieras y remisión de correspondencia, entre otros, la misma que podrá ser realizada a través de terceros. 
					Asimismo, garantizándose el pleno ejercicio de los derechos previstos en la Ley de Protección de Datos Personales (Ley N°29733) y su Reglamento (Decreto Supremo No. 003-2013-JUS) y/o de la norma que las sustituya o reglamente, el titular de los datos personales, otorga también su consentimiento previo, inequívoco, expreso e informado a FINANCIERA OH! S.A. para utilizar y entregar, en tanto esta autorización no sea revocada, sus datos personales, incluyendo datos sensibles, que hubieran sido proporcionados directamente a FINANCIERA OH! S.A. y aquellos que hayan sido obtenidos de terceros o que pudieran encontrarse en fuentes accesibles para el público; a terceros, tales como proveedores de servidores y/o servicios informáticos (eventualmente ubicados en el extranjero), los mismos que se encuentran detallados en el portal www.tarjetaoh.com.pe sección Políticas de Privacidad, para el desarrollo y/o tratamiento de acciones y/o relaciones comerciales, la realización de estudios de mercado y de riesgo crediticio, elaboración de perfiles de compra y evaluaciones financieras, la remisión, directa o por intermedio de terceros (vía medio físico, electrónico o telefónico) de publicidad, información, obsequios, ofertas, promociones, programas promocionales o de incentivos (personalizadas o generales) de productos y/o servicios de FINANCIERA OH! S.A., de establecimientos afiliados y/o de terceros con quienes mantenga relaciones comerciales y/o de otras empresas del Grupo Intercorp y sus socios estratégicos, entre las que se encuentran aquellas difundidas en el portal www.intercorp.com.pe/es. Para tales efectos, el titular de los datos personales autoriza a FINANCIERA OH! S.A. la cesión, transferencia o comunicación de sus datos personales, a dichos terceros y empresas, y entre ellos*. De igual manera, el titular también otorga su consentimiento previo, inequívoco, expreso e informado a FINANCIERA OH! S.A. para que le envíe toda y cualquier información publicitaria y/o promocional relativa a futuras ofertas de crédito emitidas o administradas por FINANCIERA OH! S.A., a través del envío de formularios y/o contratos que el titular podrá aceptar o rechazar en el plazo previsto en la oferta remitida. Igualmente, el titular autoriza ser contactado telefónicamente, presencialmente, por correo electrónico, o través de los Medios de Comunicación directa señalados en la Cláusula Vigésimo Sexta del Contrato de Tarjeta de Crédito, suscrito con FINANCIERA OH! y en el Reglamento de Gestión de Conducta de Mercado, para fines operativos, comerciales, de mercadotecnia, estadísticos, entre otros, así como autoriza la grabación de las conversaciones telefónicas entre FINANCIERA OH! S.A. y el titular, a fin que quede constancia registrada de la aceptación o el rechazo de aquellas ofertas que hayan sido ofrecidas por FINANCIERA OH! S.A. al titular. 
					El titular de datos personales podrá revocar la autorización para el tratamiento de sus datos personales en cualquier momento, de conformidad con lo previsto en la Ley de Protección de Datos Personales (Ley N° 29733) y su Reglamento (Decreto Supremo N° 003-2013-JUS) y/o de la norma que las sustituya o reglamente. Para ejercer este derecho, o cualquier otro previsto en dichas normas, incluyendo los de acceso, rectificación u oposición, el titular de datos personales podrá presentar su solicitud mediante el envío de una comunicación expresa y por escrito a FINANCIERA OH! S.A. que deberá ser entregada en cualquiera de los centros de atención al cliente y/o a la siguiente dirección de correo electrónico: datoscliente.tarjetaoh@somosoh.pe. *Algunas de las principales marcas, cuya titularidad pertenece a estas empresas son Plaza Vea, Vivanda, Mass, Economax, Justo, Oechsle, Promart, Inkafarma, Mifarma, Real Plaza, entre otras. Esta lista es enunciativa, más no limitativa.
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