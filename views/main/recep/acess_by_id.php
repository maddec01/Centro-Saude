<?php
	include('control/connect.php');

	$query = "SELECT * FROM registo_acessos ORDER BY idAcesso";
	$result = mysql_query($query,$link) or die ('A consulta falhou!: ' . mysql_error());
?>

<div align="center">
<table border="0" cellspacing="0" width="90%">
<br>

	<tr align="left">
		<th width="5%">ID</th>
		<th width="20%">Data</th>
		<th width="20%">Hora</th>
		<th width="20%">Tipo</th>
	</tr>

<?php
	if (mysql_num_rows($result) == 0) {?>
	<tr align="left">
		<td colspan="4">Nenhum registo encontrado!</td>

	</tr>
<?php
	}

	while ($reg = mysql_fetch_array($result)) {
		if ($reg["idFuncionario"]==$_GET['id']) {
?>

	<tr align="left">
		<td><?php echo $reg["idAcesso"]; ?></td>
		<td><?php echo $reg["dataAcesso"]; ?></td>
		<td><?php echo $reg["horaAcesso"]; ?></td>
		<td><?php echo $reg["tipo"]; ?></td>
	</tr>

<?php
		}
	}
?>
</table>
<br>
</div>
