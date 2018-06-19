<?php
	include('control/connect.php');

	$query = "SELECT * FROM pacientes ORDER BY idPaciente";
	$result = mysql_query($query,$link) or die ('A consulta falhou!: ' . mysql_error());
?>

<div align="center">
<br>
<table border="0" cellspacing="0" width="90%">

	<tr align="left">
		<th width="5%">ID</th>
		<th width="25%">Nome</th>
		<th width="15%">BI</th>
		<th width="15%">Cod. Postal</th>
		<th width="20%">Email</th>
		<th width="25%">Username</th>
		<th width="5%">Editar</th>
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
		<td><?php echo $reg["idPaciente"]; ?></td>
		<td><?php echo $reg["nome"]; ?></td>
		<td><?php echo $reg["bi"]; ?></td>
		<td><?php echo $reg["codPostal"]; ?></td>
		<td><?php echo $reg["email"]; ?></td>
		<td><?php echo $reg["username"]; ?></td>
		<td><a href= "index.php?view=user_edit&type=pacient&id=<?php echo $reg["idPaciente"] ?>">editar</a></td>
	</tr>

<?php
	}
?>
</table>
<br>
</div>
