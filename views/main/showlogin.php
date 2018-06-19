<script type="text/javascript"> 

function validateForm() {
	var username=document.login.user.value;
	var password=document.login.pass.value;

	if(username==null || username.trim()=="") {
		alert("Atenção! O username está vazio!")
		return false;
	}
	else if(password==null || password.trim()=="") {
		alert("Atenção! A password está vazia!")
		return false;
	}
}

</script>

<form method="POST" name="login" action="index.php?view=login" onsubmit="return validateForm();">
<div align="center">
<p><strong>Escolha o seu perfil:</strong></p>
	<input name="util" type="radio" value="enfer">Enfermeiros
	<input name="util" type="radio" value="medic">Médicos
	<input name="util" type="radio" value="recep">Recepcionistas
	<input name="util" type="radio" value="admin" checked>Administradores
	<p>Username: <input name="user" type="text"></p>
	<p>Password: <input name="pass" type="password"></p>
	<input type="submit" name="Submit" value="Enviar">
</div>
</form>
