<?php 

	if(!empty($_POST)){
		
		extract($_POST, EXTR_PREFIX_ALL, 'p');

		function malcomprobante($valor){
			$array = explode("-",$valor);
			if(!isset($array[2])){
				if(strlen($array[0])==4&&strlen($array[1])==7&&ctype_digit($array[1])){
				   return false;
				}else{
					return true;
				}
			}else
			{
				return true;
			}
		}
				
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

			else if(malcomprobante($p_comprob)){
				die('<script>window.history.back(); sessionStorage.setItem("campo", "comprobante");</script>');
			}

			//Cambiar valores de la base de datos
			$mysqli = new mysqli("localhost", "root", "contraseña", "nombreDeDataBase");
			$mysqli->set_charset('utf8');

			$mysqli->query("INSERT INTO tabla VALUES (DEFAULT,'$p_nombre','$p_apellido','$p_dni','$p_cel','$p_mail','$p_comprob',NOW(),'$p_fuente')");
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
	<title>Modelo1</title>
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
		@media(max-width: 974px) and (min-width:767px ){
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
				margin-top:10vh;
				margin-bottom:22vh;
			}
		}
		
	</style>
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
					<br><br>
					<div class="registro text-white">
						<br>
						<h1 class="text-center">Registro Exitoso</h1>
						<h2 class="text-center">Ya estás participando en el sorteo. ¡Mucha suerte!</h2>
						<br>
					</div>
					<div id="logooh">
						<p>&nbsp;</p>
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
</body>
</html>