<?php
	$disabled="";
	if(isset($_GET['type'])) {
		if($_GET['type']=="staff") {
			$disabled="disabled='true'";
		}
		else {
			$disabled="";
		}
	}
?>
<input type="button" value="Funcionário" <?php echo $disabled ?> onclick="window.location='index.php?view=<?php echo $_GET['view'] ?>&type=staff'" />
<?php
	if(isset($_GET['type'])) {
		if($_GET['type']=="pacient") {
			$disabled="disabled='true'";
		}
		else {
			$disabled="";
		}
	}
?>
<input type="button" value="Paciente" <?php echo $disabled ?> onclick="window.location='index.php?view=<?php echo $_GET['view'] ?>&type=pacient'" />
