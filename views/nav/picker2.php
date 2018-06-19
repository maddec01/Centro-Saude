<?php
	$disabled="";
	if(isset($_GET['type'])) {
		if($_GET['type']=="medic") {
			$disabled="disabled='true'";
		}
		else {
			$disabled="";
		}
	}
?>
<input type="button" value="Médico" <?php echo $disabled ?> onclick="window.location='index.php?view=<?php echo $_GET['view'] ?>&type=medic'" />
<?php
	if(isset($_GET['type'])) {
		if($_GET['type']=="enfer") {
			$disabled="disabled='true'";
		}
		else {
			$disabled="";
		}
	}
?>
<input type="button" value="Enfermeiro" <?php echo $disabled ?> onclick="window.location='index.php?view=<?php echo $_GET['view'] ?>&type=enfer'" />
