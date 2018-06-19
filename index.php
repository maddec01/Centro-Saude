<?php session_start(); ?>

<html>

<head>
	<title>ISMT: Centro de Saúde</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link rel="stylesheet" type="text/css" href="centro.css">
</head>

<body>
	<br>
	<div id="wrap">
		<div id="header1">
			<a href="http://www.ismt.pt/">
			<img src="imgs/site.png" alt="ISMT"></a>
		</div>
		<div id="header2">
			<font size="20"><h2>Centro Saúde</h2></font>
		</div>
		<div id="nav" align="center">
			&nbsp;
			<?php
			//NAV
			if(isset($_SESSION["user"])) {
				//ADMIN
				if ($_SESSION["user"]=="admin") {
					if(isset($_GET['view'])) {
						if($_GET['view']=="user_regist") {
							include("views/nav/picker.php");
						}
						else if($_GET['view']=="user_list") {
							include("views/nav/picker.php");
						}
						else if($_GET['view']=="user_edit") {
							include("views/nav/picker.php");
						}
						else if($_GET['view']=="user_acess") {
							include("views/nav/picker.php");
						}
					}
				}
				//RECEP
				if ($_SESSION["user"]=="recep") {
					if(isset($_GET['view'])) {
						if($_GET['view']=="acess_regist") {
							include("views/nav/picker2.php");
						}
					}
				}
			}			
			?>
		</div>
		<div id="main">
			<?php
			//Muda main
			if(!isset($_GET['view'])) {
				include("views/main/home_page.php");
			}
			else {
				if($_GET['view']=="about") {
					include("views/main/about.php");
				}
				//LOGIN
				else if($_GET['view']=="showlogin") {
					if(isset($_SESSION["user_name"])) {
						include("views/msg/loginexists.php");
					}
					else if(!isset($_SESSION["user"]) OR $_SESSION["user"]=="disabled") {
						include("views/main/showlogin.php");
					}
				}
				else if($_GET['view']=="login") {
					include("control/login.php");
					if(isset($_SESSION["user_name"])) {
						include("views/msg/loginok.php");
					}
					else if(!isset($_SESSION["user"])) {
						include("views/msg/loginfail.php");
					}
					else if($_SESSION["user"]=="disabled") {
						include("views/msg/loginokoff.php");
					}
				}
				else if($_GET['view']=="logout") {
					session_unset();
					include("views/main/home_page.php");
				}

				//RECEP
				else if($_SESSION["user"]=="recep") {
					//REGISTO ACESSOS CHOOSE
					if($_GET['view']=="acess_regist") {
						if(isset($_GET['type'])) {
							if($_GET['type']=="medic") {
								include("views/main/recep/acess_regist_medic.php");
							}
							if($_GET['type']=="enfer") {
								include("views/main/recep/acess_regist_enfer.php");
							}
						}
						else {
							include("views/msg/choose.php");
						}
					}
					//REGISTO ACESSOS IN
					if($_GET['view']=="acess_registIN") {
						if(isset($_GET['id'])) {
							include('control/connect.php');
							$now_date = date("Y-m-d");
							$now_time = date("H:i:s");
							$newregm = 'INSERT INTO registo_acessos (dataAcesso,horaAcesso,tipo,idFuncionario) VALUES ("'.$now_date.'", "'.$now_time.'", "E", "'.$_GET['id'].'")';
							mysql_query($newregm,$link);
							include('views/main/recep/acess_regist_ok.php');
						}
					}
					//REGISTO ACESSOS OUT
					if($_GET['view']=="acess_registOUT") {
						if(isset($_GET['id'])) {
							include('control/connect.php');
							$now_date = date("Y-m-d");
							$now_time = date("H:i:s");
							$newregm = 'INSERT INTO registo_acessos (dataAcesso,horaAcesso,tipo,idFuncionario) VALUES ("'.$now_date.'", "'.$now_time.'", "S", "'.$_GET['id'].'")';
							mysql_query($newregm,$link);
							include('views/main/recep/acess_regist_ok.php');
						}
					}
					//LISTA ACESSOS
					if($_GET['view']=="acess_list") {
						if(!isset($_GET['id'])) {
							include("views/main/recep/acess_choose.php");
						}
						else {
							include("views/main/recep/acess_by_id.php");
						}
					}
				}

				//MEDIC
				else if($_SESSION["user"]=="medic") {
					if($_GET['view']=="receita") {
						if(isset($_GET['type'])) {
							if($_GET['type']=="staff") {
								
							}
						}
						else {
							include("views/msg/choose.php");
						}
					}
				}

				//ADMIN
				else if($_SESSION["user"]=="admin") {
					//USER REGIST CHOOSE
					if($_GET['view']=="user_regist") {
						if(isset($_GET['type'])) {
							if($_GET['type']=="staff") {
								include("views/main/admin/regist_staff.php");
							}
							else if($_GET['type']=="pacient") {
								include("views/main/admin/regist_pacient.php");
							}
						}
						else {
							include("views/msg/choose.php");
						}
					}
					//USER REGIST OK
					else if($_GET['view']=="user_registOK") {
						if(isset($_GET['type'])) {
							if($_GET['type']=="staff") {
								//verefy user
								$query = 'SELECT * FROM funcionarios WHERE (username = "'.$_POST['username'].'")';
								$result = mysql_query($query,$link);
								if (mysql_num_rows($result) > 0) {
									include("views/main/admin/regist_fail.php");
								}
								//save user
								else {
									$newregm = 'INSERT INTO funcionarios (cargo,nome,sexo,username,pass,estado,email,bi,nif,morada,codPostal,dataNascimento,telefone,telemovel,numLicenca) VALUES ("'.$_POST['cargo'].'", "'.$_POST['nome'].'", "'.$_POST['sexo'].'", "'.$_POST['username'].'", "'.$_POST['pass'].'", "A", "'.$_POST['email'].'", "'.$_POST['bi'].'", "'.$_POST['nif'].'", "'.$_POST['morada'].'", "'.$_POST['codPostal'].'", "'.$_POST['dataNascimento'].'", "'.$_POST['telefone'].'", "'.$_POST['telemovel'].'", "'.$_POST['numLicenca'].'")';
									mysql_query($newregm,$link);
									include("views/main/admin/regist_ok.php");
								}
							}
							else if($_GET['type']=="pacient") {
								//verefy user
								$query = 'SELECT * FROM pacientes WHERE (username = "'.$_POST['username'].'")';
								$result = mysql_query($query,$link);
								if (mysql_num_rows($result) > 0) {
									include("views/main/admin/regist_fail.php");
								}
								///save user
								else {
									$newregm = 'INSERT INTO funcionarios (nome,sexo,username,pass,email,bi,nif,morada,codPostal,dataNascimento,telefone,telemovel,cartaoUtente) VALUES ("'.$_POST['nome'].'", "'.$_POST['sexo'].'", "'.$_POST['username'].'", "'.$_POST['pass'].'", "A", "'.$_POST['email'].'", "'.$_POST['bi'].'", "'.$_POST['nif'].'", "'.$_POST['morada'].'", "'.$_POST['codPostal'].'", "'.$_POST['dataNascimento'].'", "'.$_POST['telefone'].'", "'.$_POST['telemovel'].'", "'.$_POST['cartaoUtente'].'")';
									mysql_query($newregm,$link);
									include("views/main/admin/regist_ok.php");
								}
							}
						}
					}
					//USER REGIST LIST
					else if($_GET['view']=="user_list") {
						if(isset($_GET['type'])) {
							if($_GET['type']=="staff") {
								include("views/main/admin/list_staff.php");
							}
							else if($_GET['type']=="pacient") {
								include("views/main/admin/list_pacient.php");
							}
						}
						else {
							include("views/msg/choose.php");
						}
					}
					//USER EDIT CHOOSE
					else if($_GET['view']=="user_edit") {
						if(isset($_GET['type'])) {
							if(isset($_GET['id'])) {
								if($_GET['type']=="staff") {
									include("views/main/admin/edit_staff.php");
								}
								else if($_GET['type']=="pacient") {
									include("views/main/admin/edit_pacient.php");
								}
							}
							else {
								if($_GET['type']=="staff") {
									include("views/main/admin/list_staff_edit.php");
								}
								else if($_GET['type']=="pacient") {
									include("views/main/admin/list_pacient_edit.php");
								}
							}
						}
						else {
							include("views/msg/choose.php");
						}
					}
					//USER EDIT OK
					else if($_GET['view']=="user_editOK" AND isset($_GET['id'])) {
						//Medic
						if($_GET['type']=="staff") {
							include('control/connect.php');
							$newreg = 'UPDATE funcionarios SET nome="'.$_POST['nome'].'", sexo="'.$_POST['sexo'].'", username="'.$_POST['username'].'", pass="'.$_POST['pass'].'", email="'.$_POST['email'].'", bi="'.$_POST['bi'].'", nif="'.$_POST['nif'].'", morada="'.$_POST['morada'].'", codPostal="'.$_POST['codPostal'].'", dataNascimento="'.$_POST['dataNascimento'].'", telefone="'.$_POST['telefone'].'", telemovel="'.$_POST['telemovel'].'", numLicenca="'.$_POST['numLicenca'].'" WHERE idFuncionario="'.$_GET['id'].'"';
							mysql_query($newreg,$link);
							include("views/main/admin/edit_ok.php");
						}
						//Pacient
						else if($_GET['type']=="paciente") {
							include('control/connect.php');
							$newreg = 'UPDATE tecnicos SET nome="'.$_POST['nome'].'", sexo="'.$_POST['sexo'].'", username="'.$_POST['username'].'", pass="'.$_POST['pass'].'", email="'.$_POST['email'].'", bi="'.$_POST['bi'].'", nif="'.$_POST['nif'].'", morada="'.$_POST['morada'].'", codPostal="'.$_POST['codPostal'].'", dataNascimento="'.$_POST['dataNascimento'].'", telefone="'.$_POST['telefone'].'", telemovel="'.$_POST['telemovel'].'", cartaoUtente="'.$_POST['cartaoUtente'].'" WHERE idPaciente="'.$_GET['id'].'"';
							mysql_query($newreg,$link);
							include("views/main/admin/edit_ok.php");
						}
					}
					//EDIT ACESS CHOOSE
					else if($_GET['view']=="user_acess") {
						if(isset($_GET['type'])) {
							if($_GET['type']=="staff") {
								include("views/main/admin/acess_staff.php");
							}
							else if($_GET['type']=="pacient") {
								include("views/main/admin/acess_patient.php");
							}
						}
						else {
							include("views/msg/choose.php");
						}
					}
					//EDIT ACESS OK
					else if($_GET['view']=="acessOK") {
						if(isset($_GET['type'])) {
							if($_GET['type']=="staff") {
								include('control/connect.php');
								$query = "SELECT * FROM funcionarios ORDER BY idFuncionario";
								$result = mysql_query($query,$link) or die ('A consulta falhou!: ' . mysql_error());
								while ($reg = mysql_fetch_array($result)) {
									$temp = $reg["idFuncionario"];
									if (isset($_POST["$temp"])) {
										$update = "UPDATE funcionarios SET estado='A' WHERE idFuncionario = '$temp'";
										mysql_query($update,$link);
									}
									else {
										$update = "UPDATE funcionarios SET estado='D' WHERE idFuncionario = '$temp'";
										mysql_query($update,$link);
									}
								}
								include("views/main/admin/acess_edited.php");
							}
							else if($_GET['type']=="pacient") {
								include('control/connect.php');
								$query = "SELECT * FROM pacientes ORDER BY idPaciente";
								$result = mysql_query($query,$link) or die ('A consulta falhou!: ' . mysql_error());
								while ($reg = mysql_fetch_array($result)) {
									$temp = $reg["idPaciente"];
									if (isset($_POST["$temp"])) {
										$update = "UPDATE pacientes SET estado='A' WHERE idPaciente = '$temp'";
										mysql_query($update,$link);
									}
									else {
										$update = "UPDATE pacientes SET estado='D' WHERE idPaciente = '$temp'";
										mysql_query($update,$link);
									}
								}
								include("views/main/admin/acess_edited.php");
							}
						}
					}
				}
			}
			?>
		</div>
		<div id="sidebar">
			<?php
			//CHANGE SIDE BAR
			if(!isset($_SESSION["user"])) {
				include("views/sidebar/session_na.php");
			}
			else {
				if($_SESSION["user"]=="disabled") {
					include("views/sidebar/menu_normal.php");
				}
				else if($_SESSION["user"]=="enfer") {
					include("views/sidebar/enfer.php");
				}	
				else if($_SESSION["user"]=="medic") {	
					include("views/sidebar/medic.php");
				}
				else if($_SESSION["user"]=="recep") {
					include("views/sidebar/recep.php");
				}
				else if($_SESSION["user"]=="admin") {
					include("views/sidebar/admin.php");
				}
			}			
			?>
		</div>
		<div id="footer">
			Created and Copyrighted in 2013 by Pedro Gomes & João Teles. This site is hosted by localhost.
		</div>
	</div>

</body>

</html>
