<?php
// require("sec.php");
// if(empty($_SESSION)){
// 	session_destroy();
// 	header("Location: /morado/cotizacion.php",TRUE,303);
// 	exit(0);
// }
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Analítica</title>
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.26.14/sweetalert2.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
	<link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
	<link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/css/gijgo.min.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="css/cotizacion-morado.css">
	<style>
		html,body{
			height: 100%;
		}

		main{
			min-height: -webkit-calc(100% - 200px);
			min-height: calc(100% - 200px);
		}

		.row{
			margin-left:0;
			margin-right:0;
		}

		#caminando *:not(.h4){
			font-size: 0.9rem;
		}

		#caminando label{
			font-weight: bold;
		}
		input[type=number]::-webkit-outer-spin-button,
		input[type=number]::-webkit-inner-spin-button {
	    	-webkit-appearance: none;
    		margin: 0;
		}
		input[type=number] {
	    	-moz-appearance:textfield;
		}
		.fechas{
			font-size:0.7rem !important;
			margin-bottom: 1px;
		}
	</style>
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
</head>
<body>
	<header>
		<div class="container">
			<div class="row justify-content-between">
				<div class="col-auto">
					<h1 class="text-hide">Registro</h1>
				</div>
				<div class="col d-flex align-items-center justify-content-end">
					<ul class="nav">
						<li class="nav-item">
							<a class="nav-link active" href="request.php">Iniciativa</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="feed.php">Tu Bandeja</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" href="charts.php">Estadísticas</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="cotizacion.php">Presupuesto</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="profile.php">Tu Perfil</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="/morado">Salir</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</header>
	<main>
		<section id="bgcrear" class="pt-5 pb-5">
			<h2 class="container text-white my-3 font-weight-bold">Presupuesto participativo</h2>
		</section>
		<section class="container py-4">
			<form class="mx-auto" style="width: 70%;min-width: 360px" action="guardar.php" method="POST" target="_blank">
				<fieldset id="caminando">
					<legend class="mb-3 h4">I. Datos básicos</legend>
					<div class="row form-group no-gutters justify-content-between mb-1">
						<div class=" col-6 pl-0 pr-1">
							<input type="text" class="form-control" placeholder="Entidad" name="entidad" required >
						</div>
						<div class=" col-3 pl-0 px-1">
							<select name="inicio" id="inicio" class="form-control" required>
								<option value="" disabled selected>Año Inicio Periodo</option>
								<option value="2016">2016</option>
								<option value="2017">2017</option>
								<option value="2018">2018</option>
								<option value="2019">2019</option>
								<option value="2020">2020</option>
								<option value="2021">2021</option>
							</select>
						</div>
						<div class="col-3 pl-0 pl-1">
							<select name="fin" id="fin" class="form-control" required>
								<option value="" disabled selected>Año Fin Periodo</option>
								<option value="2016">2016</option>
								<option value="2017">2017</option>
								<option value="2018">2018</option>
								<option value="2019">2019</option>
								<option value="2020">2020</option>
								<option value="2021">2021</option>
							</select>
						</div>
					</div>
					<!-- Caja 1 - Datos básicos por año -->
					<div id="caja1">
						<div class="form-group row justify-content-between no-gutters mb-2">
							<div class="col-3 pl-0 pr-1 position-relative"> 
								<input type="text" placeholder="Inicio del Proceso"  class="form-control fixed-bottom position-absolute anio1" disabled>
							</div>
							<div class="col-3 px-1">
								<label for="feapro" class="fechas">Fecha Aprobación:</label><br>
								<input type="date" class="form-control fechiel" name="f_apro[]" required>
							</div>
							<div class="col-3 px-1">
								<label for="feini" class="fechas">Fecha Inicio:</label><br>
								<input type="date" class="form-control fechiel" name="f_ini[]" required>
							</div>
							<div class="col-3 pl-1">
								<label for="fefin" class="fechas">Fecha Fin:</label><br>
								<input type="date" class="form-control fechiel" name="f_fin[]" required>
							</div>
						</div>
						<div class="form-group row no-gutters justify-content-between">
							<div class="col-3 pr-1">
								<input type="text" class="form-control" name="n_reso[]" placeholder="Nro. de Resolución" required>
							</div>
							<div class="col-3 px-1">
								<input type="number" class="form-control" name="n_org[]" placeholder="N° de organizaciones" min="2" required>	
							</div>
							<div class="col-6 pl-1">
								<input type="text" class="form-control" name="list_org[]" placeholder="Lista de organizaciones" min="2" required>	
							</div>
							<!-- <div class="col-4 pr-1">
								<label for="feapro">Fecha Aprobación:</label><br>
								<input type="date" class="form-control fechiel" name="feapro" id="feapro">
							</div>
							<div class="col-4 px-1">
								<label for="feini">Fecha Inicio:</label><br>
								<input type="date" class="form-control fechiel" name="feini" id="feini">
							</div>
							<div class="col-4 pl-1">
								<label for="fefin">Fecha Fin:</label><br>
								<input type="date" class="form-control fechiel" name="fefin" id="fefin">
							</div> -->
						</div>
					</div>
				</fieldset>
				<br>
				<fieldset>
					<!-- Caja 2 - Identificacion y ... -->
					<legend class="mb-3 h4">II. Identificación y Priorización de Problemas</legend>
					<div class="row form-group justify-content-between" id="caja2">
						<div class="col-3 pl-0 pr-2">
							<input type="text" placeholder="Año"  class="form-control anio2" disabled >
						</div>
						<textarea name="coment[]" class="col-9 form-control" cols="40" rows="4" required></textarea>
					</div>
				</fieldset>
				<br>
				<fieldset>
					<!-- Caja 3 - Priorizacion de proyectos ... -->
					<legend class="mb-3 h4">III. Priorización de Proyectos de Inversión</legend>
					<div class="row form-group justify-content-between" id="caja3">
						<div class="col-3 pr-2 pl-0 mb-2">
							<input type="text" placeholder="Año"  class="form-control anio3" disabled>
						</div>
						<div class="col-5 pr-2 pl-0 mb-2">
							<input type="text" class="form-control" name="code[]" placeholder="Código de Proyecto" required>
						</div>
						<input type="number" class="form-control col-4 mb-2" name="monto[]" placeholder="Monto" min="0" required>
						<select name="sector" class="form-control mt-0" required>
							<option value="" selected="" disabled="">Sector</option>
							<option value="1">Agricultura</option>
							<option value="2">Ambiente</option>
							<option value="4">Cultura</option>
							<option value="5">Defensa</option>
							<option value="7">Economía y Finanzas</option>
							<option value="8">Educación</option>
							<option value="9">Energía</option>
							<option value="6">Inclusión Social</option>
							<option value="11">Justicia y Derechos humanos</option>
							<option value="16">Mujer y Poblaciones Vulnerables</option>
							<option value="12">Relaciones Exteriores</option>
							<option value="13">Salud</option>
							<option value="10">Seguridad</option>
							<option value="14">Trabajo</option>
							<option value="15">Transporte</option>
							<option value="3">Turismo</option>
							<option value="17">Vivienda</option>
						</select>
					</div>
				</fieldset>
				<br>
				<fieldset>
					<!-- Caja 4 - Ejecución de Proyectos de Inversion ... -->
					<legend class="mb-3 h4">IV. Ejecución proyecto de inversión priorizados</legend>
					<div class="row form-group justify-content-between" id="caja4">
						<div class="col-3 pr-2 pl-0">
							<input type="text" placeholder="Año"  class="form-control anio4" disabled>	
						</div>
						<div class=" col-5 pr-2  pl-0">
							<input type="number" class="form-control" name="exec_monto[]" placeholder="Monto" min="0" required>
						</div>
						<input type="number" name="executed[]"  class="form-control col-4" placeholder="Ejecutado" required>
					</div>
				</fieldset>
				<br>
				<fieldset>
					<!-- Caja 5 - Miembros del comite -->
					<legend class="mb-3 h4">V. Miembros del comité de vigilancia</legend>
					<div class="row form-group justify-content-between" id="caja5">
						<div class="col-3 pr-2 pl-0">
							<input type="text" placeholder="Año"  class="form-control anio5" disabled>	
						</div>					
						<input type="text" placeholder="Nombre Completo" class="col-9 form-control" name="name[]" required>
						<input type="email" name="email[]"  placeholder="Correo" class="col-5 form-control mt-4" required>
						<input type="number" class="form-control col-5 mt-4" min="900000000" max="999999999" name="cel[]" id="celu" placeholder="Número de teléfono" required>
					</div>
				</fieldset>
				<br>
				<div class="form-group text-center">
					<input type="submit" value="Enviar" class="btn btn-lg btn-primary">
				</div>
			</form>
		</section>
	</main>
	<script>
		$(function(){
			var n_cajas=5;
			var cajita={
						1:"1",
						2:"2",
						3:"3",
						4:"4",
						5:"5"							
			};
			$("#inicio").change(function(){	
				if($("#inicio").val()&&$("#fin").val()){	
					if($("#inicio").val()<=$("#fin").val()){
						$(".clone").remove();
						var i = $("#inicio").val();
						var j = $("#fin").val();
						for(j; j>=i;j--){
							if(j==i){
								for(cont=1;cont<=n_cajas;cont++){
									$(".anio"+cont+":first").val(j);
								}
							}else{
								for(cont=1;cont<=n_cajas;cont++){
									cajita[cont] = $("#caja"+cont).clone().attr("id","");
									cajita[cont].addClass("clone");
									cajita[cont].find(".anio"+cont).val(j);
									cajita[cont].insertAfter("#caja"+cont);
								}
							}
						}
					}else{
						alert("El Año Fin de Periodo deber ser mayor o igual que el año de Inicio.");
						$("#inicio").val("");
						$(".clone").remove();
						for(cont=1;cont<=n_cajas;cont++){$(".anio"+cont+":first").val(j);
							$(".anio"+cont+":first").val("");
						}
					}
				}
			});
			$("#fin").change(function(){
				if( $("#inicio").val()&&$("#fin").val()){	
					if($("#inicio").val()<=$("#fin").val()){
						$(".clone").remove();
						var i = $("#inicio").val();
						var j = $("#fin").val();
						for(j; j>=i;j--){
							if(j==i){
								for(cont=1;cont<=n_cajas;cont++){
									$(".anio"+cont+":first").val(j);
								}
							}else{
								for(cont=1;cont<=n_cajas;cont++){
									cajita[cont] = $("#caja"+cont).clone().attr("id","");
									cajita[cont].addClass("clone");
									cajita[cont].find(".anio"+cont).val(j);
									cajita[cont].insertAfter("#caja"+cont);
								}
							}
						}
					}else{
						alert("El Año Fin de Periodo deber ser mayor o igual que el año de Inicio.");
						$("#fin").val("");
						$(".clone").remove();
						for(cont=1;cont<=n_cajas;cont++){$(".anio"+cont+":first").val(j);
							$(".anio"+cont+":first").val("");
						}
					}
				}
			});
		});	
	</script>

</body>
