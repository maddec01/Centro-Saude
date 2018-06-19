<?php
	include('control/connect.php');

	$query = 'SELECT * FROM funcionarios WHERE (idFuncionario = "'.$_GET["id"].'")';
	$result = mysql_query($query,$link) or die ('A consulta falhou!: ' . mysql_error());
	$registo = mysql_fetch_assoc($result);
?>

<script type="text/javascript">

function isNumber(n) {
	return (parseFloat(n) == n);
}

function validateEmail(email) { 
	var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return re.test(email);
}

function validateForm() {
	var username=document.registration.username.value;
	var password=document.registration.pass.value;
	var passwordc=document.registration.pass_confirm.value;
	var nome=document.registration.nome.value;
	var data=document.registration.dataNascimento.value;
	var bi=document.registration.bi.value;
	var nif=document.registration.nif.value;
	var numLicenca=document.registration.numLicenca.value;
	var morada=document.registration.morada.value;
	var cod_postal=document.registration.codPostal.value;
	var telefone=document.registration.telefone.value;
	var telemovel=document.registration.telemovel.value;
	var email=document.registration.email.value;

	if(nome==null || nome.trim()=="") {
		alert("Nome obrigatório!")
		return false;
	}
	else if(data==null || data.trim()=="") {
		alert("Data obrigatório!")
		return false;
	}
	else if(!isNumber(bi)) {
		alert("BI só pode conter números!")
		return false;
	}
	else if(bi==null || bi.trim()=="") {
		alert("BI obrigatório!")
		return false;
	}
	else if(!isNumber(nif)) {
		alert("NIF só pode conter números!")
		return false;
	}
	else if(nif==null || nif.trim()=="") {
		alert("NIF obrigatório!")
		return false;
	}
	else if(!isNumber(numLicenca)) {
		alert("Licença só pode conter números!")
		return false;
	}
	else if(numLicenca==null || numLicenca.trim()=="") {
		alert("Licença obrigatória!")
		return false;
	}
	else if(morada==null || morada.trim()=="") {
		alert("Morada obrigatória!")
		return false;
	}
	else if(cod_postal==null || cod_postal.trim()=="") {
		alert("Código postal obrigatório!")
		return false;
	}
	else if(cod_postal.length!=7) {
		alert("Código postal inválido!")
		return false;
	}
	else if(!isNumber(cod_postal)) {
		alert("Código postal só pode conter números!")
		return false;
	}
	else if(telefone==null || telefone.trim()=="") {
		alert("Telefone obrigatório!")
		return false;
	}
	else if(!isNumber(telefone)) {
		alert("Telefone só pode conter números!")
		return false;
	}
	else if(telefone.length!=9) {
		alert("Numero inválido!")
		return false;
	}
	else if(telemovel==null || telemovel.trim()=="") {
		alert("Telemóvel obrigatório!")
		return false;
	}
	else if(!isNumber(telemovel)) {
		alert("Telemóvel só pode conter números!")
		return false;
	}
	else if(telemovel.length!=9) {
		alert("Numero inválido!")
		return false;
	}
	else if(email==null || email.trim()=="") {
		alert("Email obrigatório!")
		return false;
	}
	else if(!validateEmail(email)) {
		alert("Email inválido!")
		return false;
	}
	else if(username==null || username.trim()=="") {
		alert("Atenção! O username está vazio!")
		return false;
	}
	else if(password==null || password.trim()=="") {
		alert("Atenção! A password está vazia!")
		return false;
	}
	else if(passwordc==null || passwordc.trim()=="") {
		alert("Atenção! Precisa de confirmar a password")
		return false;
	}
	else if(passwordc.trim()!=password.trim()) {
		alert("As passwords não são iguais!")
		return false;
	}
}

</script>

<form method="POST" name='registration' action="index.php?view=user_editOK&type=staff&id=<?php echo $_GET["id"] ?>" onsubmit="return validateForm();">
<div align="center">
<table border="0" cellspacing="0" width="100%">
<font face="Arial">
	<br>
	<!-- --------- 1ª Linha --------------- -->
	<tr>
		<td colspan="2" align="center"><strong>Dados Pessoais</strong></td>
	</tr>
	<!-- ---------   Space  --------------- -->
	<tr>
		<td colspan="2">&nbsp;</td>
	</tr>
	<!-- --------- 2ª Linha --------------- -->
	<tr>
		<td width="50%" align="right">Nome:&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td width="50%"><input name="nome" type="text" value="<?php echo $registo["nome"]; ?>" maxlength="100"></td>
	</tr>
	<!-- --------- 3ª Linha --------------- -->
	<tr>
		<td align="right">Sexo:&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<?php
			if ($registo["sexo"]=="M") {?>
				<td><input name="sexo" type="radio" value="M" checked="yes">Masculino <input name="sexo" type="radio" value="F">Feminino</td>
		<?php
			}
			else {?>
				<td><input name="sexo" type="radio" value="M">Masculino <input name="sexo" type="radio" value="F" checked="yes">Feminino</td>
		<?php
			}
		?>
	</tr>
	<!-- --------- 4ª Linha --------------- -->
	<tr>
		<td align="right">Data de Nascimento:&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><input name="dataNascimento" type="date" value="<?php echo $registo["dataNascimento"]; ?>"></td>
	</tr>
	<!-- --------- 5ª Linha --------------- -->
	<tr>
		<td align="right">BI/CC:&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><input name="bi" type="text" maxlength="10" value="<?php echo $registo["bi"]; ?>"></td>
	</tr>
	<!-- --------- 5ª Linha --------------- -->
	<tr>
		<td align="right">NIF:&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><input name="nif" type="text" maxlength="10" value="<?php echo $registo["nif"]; ?>"></td>
	</tr>
	<!-- --------- 5ª Linha --------------- -->
	<tr>
		<td align="right">Licença:&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><input name="numLicenca" type="text" maxlength="10" value="<?php echo $registo["numLicenca"]; ?>"></td>
	</tr>
	<!-- --------- 6ª Linha --------------- -->
	<tr>
		<td align="right">Morada:&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><input name="morada" type="text" maxlength="100" value="<?php echo $registo["morada"]; ?>"></td>
	</tr>
	<!-- --------- 6-1ª Linha --------------- -->
	<tr>
		<td align="right">Código Postal:&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><input name="codPostal" type="text" maxlength="7" value="<?php echo $registo["codPostal"]; ?>"></td>
	</tr>
	<!-- --------- 7ª Linha --------------- -->
	<tr>
		<td align="right">Telefone:&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><input name="telefone" type="text" maxlength="9" value="<?php echo $registo["telefone"]; ?>"></td>
	</tr>
	<!-- --------- 8ª Linha --------------- -->
	<tr>
		<td align="right">Telemóvel:&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><input name="telemovel" type="text" maxlength="9" value="<?php echo $registo["telemovel"]; ?>"></td>
	</tr>
	<!-- --------- 9ª Linha --------------- -->
	<tr>
		<td align="right">Email:&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><input name="email" type="text" maxlength="50" value="<?php echo $registo["email"]; ?>"></td>
	</tr>
	<!-- ---------   Space  --------------- -->
	<tr>
		<td colspan="2">&nbsp;</td>
	</tr>
	<!-- --------- 10ª Linha --------------- -->
	<tr>
		<td colspan="2" align="center"><strong>Credenciais para registo</strong></td>
	</tr>
	<!-- ---------   Space  --------------- -->
	<tr>
		<td colspan="2">&nbsp;</td>
	</tr>
	<!-- --------- 11ª Linha --------------- -->
	<tr>
		<td align="right">Username:&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><input name="username" type="text" maxlength="20" value="<?php echo $registo["username"]; ?>"></td>
	</tr>
	<!-- --------- 12ª Linha --------------- -->
	<tr>
		<td align="right">Password:&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><input name="pass" type="password" maxlength="20" value="<?php echo $registo["pass"]; ?>"></td>
	</tr>
	<!-- --------- 13ª Linha --------------- -->
	<tr>
		<td align="right">Confirme a Password:&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><input name="pass_confirm" type="password" maxlength="20" value="<?php echo $registo["pass"]; ?>"></td>
	</tr>
	<!-- ---------   Space  --------------- -->
	<tr>
		<td colspan="2">&nbsp;</td>
	</tr>
	<!-- --------- 14ª Linha --------------- -->
	<tr>
		<td colspan="2" align="center"><input type="submit" name="Submit" value="Submeter"></td>
	</tr>
</font>
</table>
</div>
</form>
