<?php 

require('sec.php');

if(empty($_SESSION)){
	session_destroy();
	header("Location: /morado",TRUE,303);
	exit(0);
}else{
	$query = $mysqli->query("SELECT nombres,apellidos,correo,phone,dni,distrito,region,provincia FROM users WHERE id='$s_id'");
	$datos = $query->fetch_row();
	$query2 = $mysqli->query("SELECT idZona FROM distrito WHERE idDist='$datos[5]'");
	$id_zona = $query2->fetch_row(); 	
	$query4 = $mysqli->query("SELECT distrito FROM distrito WHERE idDist='$datos[5]'");
	$distrito = $query4->fetch_row();
	$distrito1= ucfirst($distrito[0]);
	$query5 = $mysqli->query("SELECT departamento FROM departamento WHERE idDepa='$datos[6]'");
	$region = $query5->fetch_row();
	$region1= ucfirst($region[0]);
	$query6 = $mysqli->query("SELECT provincia FROM provincia WHERE idProv='$datos[7]'");
	$provincia = $query6->fetch_row();
	$provincia1= ucfirst($provincia[0]);
	$mysqli->close();
}
?>
<!DOCTYPE html>
<html lang="es">
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
	
	<title>Analitica</title>
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/profile-morado.css">
	<style>
		html,body{
			height: 100%;
		}
		main{
			min-height: -webkit-calc(100% - 200px);
			min-height: calc(100% - 200px);
		}
		.col-12{
			text:center;
		}
		input{
			border:none;
			margin-bottom:0.8rem;
		}
		input[type="text" i]:disabled {
    		background-color: rgb(255,255,255);
			color:gray;
		}
		.editable{
			border-style:inset;
			border-width:1px;
			border-radius:0.8rem;
			border-color:rgba(102, 0, 135, 0.6);
			padding:5px;
			outline:none;
		}
	</style>
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
</head>
<body>
	<header>
		<!-- Nota Importante falta actualiar el nav ya que no es responsive -->
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
			<h2 class="container text-white my-3 font-weight-bold">Hola <?php echo "$datos[0]";?>,</h2>
			<h4 class="container text-white my-3">Tu ID morado es <?php echo "$datos[4]";?></h4>
		</section>	
		<div class="container my-5" style="max-width:1000px;">
			<div class="row mx-auto text-sm-left text-center border-bottom pb-sm-3 pb-1" style="color:gray;">
				<div class="col-md-3 offset-md-1 col-sm-12 col-12">
					<p class="h4 mb-5" style ="color:gray;">Cuenta</p>
				</div>
				<div class="col-md-3 col-sm-6 col-12" style="">
					<p class="h4 pb-0" style ="font-size:15px;">NOMBRES Y APELLIDOS<br></p>
					<input type="text" class="text-sm-left text-center" value='<?php echo "$datos[0] $datos[1]";?>' disabled>
					<p class="h4 pb-0" style ="font-size:15px">CORREO <br></p>
					<input type="text" class="text-sm-left text-center" value='<?php echo "$datos[2]";?>' disabled>
					<p class="h4 pb-0" style ="font-size:15px">TELEFONO <br></p>
					<input type="text" class="text-sm-left text-center" value='<?php echo "$datos[3]";?>' disabled>
				</div>
				<div class="col-md-3 col-sm-4 col-12">
					<p class="h4 pb-0" style ="font-size:15px;">REGION <br></p>
					<input type="text" class="text-sm-left text-center" value='<?php echo "$region1";?>' disabled>
					<p class="h4 pb-0" style ="font-size:15px">PROVINCIA <br></p>
					<input type="text" class="text-sm-left text-center" value='<?php echo "$provincia1";?>' disabled>
					<p class="h4 pb-0" style ="font-size:15px">DISTRITO<br></p>
					<?php 
							$array = explode(" ",$distrito1);
							foreach($array as $i=>$dato){
								$array[$i]=ucfirst($array[$i]);
								$provincia2.=$array[$i]." ";
							}
					?>
					<input type="text" class="text-sm-left text-center" value='<?php echo "$provincia2";?>' disabled>
				</div>
				<div class="col-md-1 offset-md-1 col-sm-1 col-12 mt-sm-0 mt-4 mb-sm-0 mb-3 mt-lg-3">
					<input type="button" class="btn btn-primary btn-sm" id="submit" value="Editar">
				</div>
			</div>
			<div class="row mx-auto mt-4">
				<div class=" col-6 col-sm-6 col-md-3 offset-md-1">
					<p class="h4 mb-5" style ="color:gray;">Seguridad</p>
				</div>
				<div class="col-6 col-sm-6 col-md-8" style="">
					<p class="h4 " style ="font-size:15px;color:gray">Contraseña<br></h3>
					<a href="#" style="font-size:0.8rem">Cambiar la contraseña...</a>
				</div>
			</div>
		</div>
	</main>
	<footer class="py-5" style="background-color: #31393f">
		<p class="container mb-0" style="color: #a0a9b1">Desarrollado por <a href="https://www.facebook.com/saphi.io/">SAPHI TECHNOLOGIES</a></p>
	</footer>
	<script>
		$(function(){
			$("#submit").click(function (){
				if($("#submit").val()=="Editar"){
					$("input").removeAttr("disabled");
					$("input").addClass("editable");
					$("#submit").val("Cancelar");
				}else if($("#submit").val()=="Cancelar"){
					$("input:text").attr("disabled","disabled");
					$("input").removeClass("editable");
					$("#submit").val("Editar");
				}
			});
		});
	</script>
</body>
</html>
<!-- 
╭━┳━╭━╭━╮╮
┃┈┈┈┣▅╋▅┫┃			
┃┈┃┈╰━╰━━━━━━╮
╰┳╯┈┈┈┈┈┈┈┈┈◢▉◣
╲┃┈┈┈┈┈┈┈┈┈┈▉▉▉
╲┃┈┈┈┈┈┈┈┈┈┈◥▉◤
╲┃┈┈┈┈╭━┳━━━━╯ El señor del tiempo estuvo aquí. Deloi
-->
