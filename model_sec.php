<?php 

	date_default_timezone_set('America/Lima');
	$mysqli = new mysqli("localhost", "user", "contrasena", "database");
	$mysqli->set_charset("utf8");
	$mysqli->query('SET time_zone = "-05:00"');

	session_start();

	if(empty($_SESSION)){
		session_destroy();
		header("Location: /morado",TRUE,303);
		exit(0);
	}

	extract($_SESSION, EXTR_PREFIX_ALL, 's');
	extract($_POST, EXTR_PREFIX_ALL, 'p');

	function notienepermiso($a){
		global $mysqli,$s_grupo;
		$qrypermiso = $mysqli->query("SELECT permisos FROM grupos WHERE id='$s_grupo'");
		$rowpermiso = $qrypermiso->fetch_row();
		$permisos = $rowpermiso[0];
		return strpos($permisos, $a) == false;
	}

?>