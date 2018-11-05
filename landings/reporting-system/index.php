<?php 
	
	require('sec.php');

	$query = $mysqli->query("SELECT nombre,apellido,dni,celular,correo,comprobante,registro FROM nombre_de_la_tabla ORDER BY registro DESC LIMIT 62755");
	//62755 is the max value of records that datatables 1.x can handle
	$tbody='';

	$total = $query->num_rows;

	//use \ForceUTF8\Encoding;
	//Encoding::fixUTF8();

	while ($row = $query->fetch_row()) {
		$tbody.='<tr><td>'.$row[6].'</td><td>'.ucwords(strtolower($row[0])).'</td><td>'.ucwords(strtolower($row[1])).'</td><td align="center">'.$row[2].'</td><td>'.$row[3].'</td><td>'.strtolower($row[4]).'</td></td><td>'.strtoupper($row[5]).'</td></tr>';
	}
	

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Reporting System</title>
	<meta name="robots" content="noindex">
	<meta name="googlebot" content="noindex">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
	<link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="css/estilos.css">
</head>
<body>
	<header class="page-header">
		<div class="container">
			<h1>Reporting System</h1>			
		</div>
	</header>
	<main class="container">
		<div id="load">
			<br>
			<div id="circularG">
				<div id="circularG_1" class="circularG"></div>
				<div id="circularG_2" class="circularG"></div>
				<div id="circularG_3" class="circularG"></div>
				<div id="circularG_4" class="circularG"></div>
				<div id="circularG_5" class="circularG"></div>
				<div id="circularG_6" class="circularG"></div>
				<div id="circularG_7" class="circularG"></div>
				<div id="circularG_8" class="circularG"></div>
			</div>
			<br>
			<p class="text-center">Cargando <?php echo $total; ?> leads</p>
		</div>
		<table id="reporting">
			<thead>
				<tr>
					<th>Registrado</th>
					<th>Nombre(s)</th>
					<th>Apellido(s)</th>
					<th align="left">DNI</th>
					<th>Celular</th>
					<th>Correo</th>
					<th>Comprobante</th>
				</tr>
			</thead>
			<tbody>
				<?php echo $tbody; ?>
			</tbody>
		</table>
	</main>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="//cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js"></script>
	<script>
		$(function(){

			$('#reporting').DataTable({

				"iDisplayLength": 25,

				"order": [[ 0, "desc" ]],

				buttons: ['excelHtml5'],

				dom: 'lBfrtip',

				language: {
					url : 'https://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json'
				},
				"initComplete": function(settings, json) {
					$(".dataTables_filter input, .dataTables_length select").addClass('form-control').css({
						'display': 'inline',
						'width': 'auto'
					});

					$("#reporting, #load").toggle();

					$(".buttons-excel").addClass('btn btn-success').html('<span class="icon-file-excel"></span> Exportar');
				}
			});

		});
	</script>
</body>
</html>