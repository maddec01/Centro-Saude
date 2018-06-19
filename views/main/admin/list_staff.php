<?php
	include('control/connect.php');

	$query = "SELECT * FROM funcionarios ORDER BY idFuncionario";
	$result = mysql_query($query,$link) or die ('A consulta falhou!: ' . mysql_error());
?>

<div align="center">
<table border="0" cellspacing="0" width="90%">
<br>

	<tr align="left">
		<th width="5%">ID</th>
		<th width="25%">Nome</th>
		<th width="15%">BI</th>
		<th width="15%">Cargo</th>
		<th width="20%">Email</th>
		<th width="25%">Username</th>
	</tr>

<?php
	if (mysql_num_rows($result) == 0) {?>
	<tr align="left">
		<td colspan="4">Nenhum registo encontrado!</td>

	</tr>
<?php
	}

	while ($reg = mysql_fetch_array($result)) {
?>

	<tr align="left">
		<td><?php echo $reg["idFuncionario"]; ?></td>
		<td><?php echo $reg["nome"]; ?></td>
		<td><?php echo $reg["bi"]; ?></td>
		<td><?php echo $reg["cargo"]; ?></td>
		<td><?php echo $reg["email"]; ?></td>
		<td><?php echo $reg["username"]; ?></td>
	</tr>

<?php
	}
?>
</table>
<br>
</div>
