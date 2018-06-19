<?php

	//Faz conecção a DB
	include('control/connect.php');	

	//Verfica a escolha no showlogin.php
	if(isset($_POST['util'])) {
		$temp=$_POST['util'];
	}
	//Faz query a base de dados com o user e password do showlogin.php e o tipo de users
	$query = 'SELECT * FROM funcionarios WHERE (cargo = "'.$temp.'" AND username = "'.$_POST["user"].'" AND pass = "'.$_POST["pass"].'")';
	$result = mysql_query($query,$link) or die ('A consulta falhou!: ' . mysql_error());

	//Verifica o numero de registos coincidentes com o query
	if(mysql_num_rows($result)>0) {
		//Faz fetch da linha resultante do query
		$registo = mysql_fetch_assoc($result);
		if($registo["estado"]=="A") {
			$_SESSION["user"]=$temp;
			$_SESSION["user_name"]=$registo["nome"];
		}
		else {
			$_SESSION["user"]="disabled";
		}
	}
?>
