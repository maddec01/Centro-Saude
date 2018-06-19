<?php
	//Dados de conecção! A alterar conforme for preciso (CASE SENSITIVE)
	$host = "localhost";
	$username = "root";
	$password = "mpF1ve";
	$db = "centro_saude";

	//Conecta a base dados!
	$link = mysql_connect($host,$username,$password) or die('Não foi possível conectar: ' . mysql_error());
	mysql_select_db($db,$link) or die('Não foi possível seleccionar a base da dados');
?>
