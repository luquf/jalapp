<?php

session_start();
$_SESSION['lang'] = "en";

if (!isset($_SESSION["connected"]) || $_SESSION["connected"] == "false") {
    header("Location: inscription.php");
    exit();
} else {
    if (isset($_SESSION["is_admin"]) && $_SESSION["is_admin"] == 1) {
        header("Location: admin_interface.php");
        exit();
    }
}

require_once __DIR__ . "/../../controllers/piece.php";

if (isset($_GET['piece']) && $_GET['piece'] != "") {
    $piece = getPiecesByID(htmlspecialchars($_GET['piece']));
    if (count($piece) == 0) {
        header("Location: domicile.php");
    } else if ($piece[0][16] != $_SESSION['user_id']) {
		header("Location: domicile.php");
	} 
    $_SESSION['piece_id'] = htmlspecialchars($_GET['piece']);
} else {
    header("Location: domicile.php");
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../../public/css/piece1.css" />
		<link rel="icon" type="image/png" href="../../public/assets/favicon.png" />
		<link rel="stylesheet" href="../../public/assets/fontawesome-free-5.6.3-web/css/all.css" />
		<script src='../../public/js/jquery-3.3.1.min.js'></script>
		<title>Domisep: Room(s) </title>

	</head>

	<body>
		<div id="bandeau">
			<div class="logo">

					<a href="domicile.php"> <img src="../../public/assets/logo.png" alt = "Logo Domisep" id="logo" title = "Logo Domisep"  />

			</div>



			<div id="bandeau_droite">
					<div class="language">
					<a href= "../piece1.php"> <img src="../../public/assets/france.png" id="language"></a>
						</div>

					<div class="aide">
						<a href= "aide_accueil.php" style = "text-decoration: none; color: #515659"	> Help </a>
					</div>


					<div class="settings">
						<a href= "user_settings.php" style = "text-decoration: none; color: #515659">Settings</a>
					</div>
					<div class="connexion">
						<a href="inscription.php" style = "text-decoration: none; color: #515659"> Logout </a>
					</div>


				</div>

		</div>

		<div id="slogan">
			<h1>
				I control my sensors !
			</h1>
		</div>

		</div>
		<div id='tab1'>
			<?php echo "<a id='back-button' href='domicile.php?dom=" . $_SESSION['domicile_id'] . "' style='text-decoration: none;color: #515659;'><i class='fa fa-arrow-circle-left fa-lg'></i> <b>Back</b></a>"; ?>


			<div class="sensor-left">
				<h1 class="titre"><i class="fa fa-microchip fa-sm"></i> Sensors</h1>
					<ul class="sensor-ul-top" id="capt">
						<?php
require_once __DIR__ . '/../../controllers/capteur.php';
$capteurs = getCapteursControllerPIECE($_SESSION['piece_id']);
if (count($capteurs) == 0) {
    echo "<li class='no-sensors'><i class='fa fa-exclamation-triangle'></i> You don't have any sensor yet.</li>";
} else {
    foreach ($capteurs as $capteur) {
		$t = "";
        switch ($capteur[2]) {
            case "HUM":
                $t = "Humidity";
                break;
            case "TEMP":
                $t = "Temperature";
                break;
            case "FUM":
                $t = "Smoke";
                break;
            default:
                break;
        }
        echo "<li class=liste id='element-" . $capteur[0] . "'><span id='display-" . $capteur[0] . "'>Name: " . $capteur[1] . "<br>Type: " . $t . "<br>State: " . $capteur[3] . "</span>
								</br></br><form method='post' action='../../controllers/action.php'>
								<input type='hidden' value=" . $capteur[0] . " name='capteur' id='capteur'/>
								<input type='hidden' value='capt_info' name='action' id='action'/>
								<button>Information </button>
								</form>
								<input type='hidden' value=" . $capteur[0] . " name='capteur' id='capteur'/>
								<input type='hidden' value='capt_delete' name='action' id='action'/>
								<button type='submit' id='del-" . $capteur[0] . "'>Delete</button>
								<input type='hidden' value=" . $capteur[0] . " name='capteur' id='capteur'/>
								<input type='hidden' value='capt_change' name='action' id='action'/>
								<button type='submit' id='change-" . $capteur[0] . "'>Change</button>
								</li>
								<script>
									$('#change-" . $capteur[0] . "').click(function() {
										  $.post('../../controllers/action.php',
										  {
											action: 'capt_change',
											capteur: '" . $capteur[0] . "'
										  },
										  function(data, status){
											if (status == 'success') {
												if ($('#display-" . $capteur[0] . "').text().includes('OFF')) {
													$('#display-" . $capteur[0] . "').html('Name: " . $capteur[1] . "<br>Type: " . $t . "<br>State: ON');
												} else {
													$('#display-" . $capteur[0] . "').html('Name: " . $capteur[1] . "<br>Type: " . $t . "<br>State: OFF');
												}
											}
										  });
									});

									$('#del-" . $capteur[0] . "').click(function() {
										if (confirm('Do you really want to delete this sensor ?')) {
											$.post('../../controllers/action.php',
											{
											action: 'capt_delete',
											capteur: '" . $capteur[0] . "'
											},
											function(data, status){
											if (status == 'success') {
												$('#element-" . $capteur[0] . "').remove();
											}
											});
										}
								  });

								</script>";
    }
}
?>
					</ul>
			</div>



			<div class="sensor-right">
				<h1 class="titre"><i class="fa fa-cogs fa-sm"></i> Controllers</h1>
					<ul class="sensor-ul-bottom" id="cont">
						<?php
$controleurs = getControleursControllerPIECE($_SESSION['piece_id']);
if (count($controleurs) == 0) {
    echo '<li class=\'no-sensors\'><i class=\'fa fa-exclamation-triangle\'></i>  You don\'t have any sensor yet.</li>';
} else {
    foreach ($controleurs as $controleur) {
		$type = $controleur[2];
		$t = "";
        switch ($type) {
            case "LUM":
                $t = "Brightness";
                break;
            case "VOL":
                $t = "Electric Shutter";
                break;
            case "CH":
                $t = "Heating";
                break;
            default:
                break;
        }
		if ($type == "CH") {
			echo "<li class=liste id='element-" . $controleur[0] . "'><span id='display-" . $controleur[0] . "'>Name: " . $controleur[1] . "<br>Type: " . $t . "<br>Value: " . $controleur[3] . " °C</span>
									</br></br><form method='post' action='../../controllers/action.php'>
									<input type='hidden' value=" . $controleur[0] . " name='capteur' id='capteur'/>
									<input type='hidden' value='cont_info' name='action' id='action'/>
									<button type='submit'>Information</button>
									</form>
									<input type='hidden' value=" . $controleur[0] . " name='capteur' id='capteur'/>
									<input type='hidden' value='cont_delete' name='action' id='action'/>
									<button type='button' id='del-" . $controleur[0] . "'>Delete</button><br>
									<input type='hidden' value=" . $controleur[0] . " name='capteur' id='capteur'/>
									<input type='hidden' value='cont_change' name='action' id='action'/>
									<input type='range' class='cont-val' id='change-" . $controleur[0] . "' name='cont-val' min='10' max='30' step='1' value=" . $controleur[3] . ">
									</li>
									<script>
									$('#change-" . $controleur[0] . "').change(function() {
										  $.post('../../controllers/action.php',
										  {
											action: 'cont_change',
											capteur: '" . $controleur[0] . "',
											'cont-val': $(this).val()
										  },
										  function(data, status){
											if (status == 'success') {
												$('#display-" . $controleur[0] . "').html('Name: " . $controleur[1] . "<br>Type: " . $t . "<br>Value: '+$('#change-" . $controleur[0] . "').val()+' °C');
											}
										  });
									});

									$('#del-" . $controleur[0] . "').click(function() {
										if (confirm('Do you really want to delete this controller ?')) {
											$.post('../../controllers/action.php',
											{
											action: 'cont_delete',
											capteur: '" . $controleur[0] . "',
											},
											function(data, status){
											if (status == 'success') {
												$('#element-" . $controleur[0] . "').remove();
											}
											});
										}
								  });

								</script>";
		} else {
			echo "<li class=liste id='element-" . $controleur[0] . "'><span id='display-" . $controleur[0] . "'>Name: " . $controleur[1] . "<br>Type: " . $t . "<br>Value: " . $controleur[3] . " %</span>
									</br></br><form method='post' action='../../controllers/action.php'>
									<input type='hidden' value=" . $controleur[0] . " name='capteur' id='capteur'/>
									<input type='hidden' value='cont_info' name='action' id='action'/>
									<button type='submit'>Informations</button>
									</form>
									<input type='hidden' value=" . $controleur[0] . " name='capteur' id='capteur'/>
									<input type='hidden' value='cont_delete' name='action' id='action'/>
									<button type='button' id='del-" . $controleur[0] . "'>Delete</button><br>
									<input type='hidden' value=" . $controleur[0] . " name='capteur' id='capteur'/>
									<input type='hidden' value='cont_change' name='action' id='action'/>
									<input type='range' class='cont-val' id='change-" . $controleur[0] . "' name='cont-val' min='0' max='100' step='5' value=" . $controleur[3] . ">
									</li>
									<script>
									$('#change-" . $controleur[0] . "').change(function() {
										  $.post('../../controllers/action.php',
										  {
											action: 'cont_change',
											capteur: '" . $controleur[0] . "',
											'cont-val': $(this).val()
										  },
										  function(data, status){
											if (status == 'success') {
												$('#display-" . $controleur[0] . "').html('Name: " . $controleur[1] . "<br>Type: " . $t . "<br>Value: '+$('#change-" . $controleur[0] . "').val()+' %');
											}
										  });
									});

									$('#del-" . $controleur[0] . "').click(function() {
										if (confirm('Do you really want to delete this controller ?')) {
											$.post('../../controllers/action.php',
											{
											action: 'cont_delete',
											capteur: '" . $controleur[0] . "',
											},
											function(data, status){
											if (status == 'success') {
												$('#element-" . $controleur[0] . "').remove();
											}
											});
										}
								  });

								</script>";
		}
    }
}
?>
					</ul>
			</div>
			<input id='add_capteur' type="button"  value='+' />
		</div>



		<div class="modal1" id="myModal">
			<div class="modal-content">
				<span class="close">&times;</span>
    			<h2>Add a new sensor</h2>
				<form method="post" action="../../controllers/capteur.php">
						<input class="input" type="text" name="name" id="name" placeholder="Name of the Sensor" size="30" maxlength="20"/ required>
                        <input class="input" type="text" name="ref" id="ref" placeholder="Key of the sensor" size="30" maxlength="20" required/>
						<select class="input input-dropdown" id="capteur" name="capteur">
							<option value="hum">Humidity Sensor</option>
							<option value="temp">Temperature Sensor</option>
							<option value="fum">Smoke Sensor</option>
							<option value="lum">Brightness Controller</option>
							<option value="vol">Shutter Controller</option>
							<option value="ch">Heating Controller</option>
						</select>
						<button id ="validation1" type="submit">Add</button>
				</form>
						<script>
						$("#ref").on('input', function() {
							ref = $("#ref").val();
							var regExp = /^[a-z0-9]+$/i;
							$.post('../../controllers/capteur.php',
										{
										  'reference': ref
										},
										function(data, status, req){
											exists = req.getResponseHeader('Sensor-exists');
											if (exists == "false") {
												if (regExp.test($('#ref').val()) && ref.length >= 8) {
													$("#validation1").prop('disabled', false).text("Add");
												} else {
													$("#validation1").prop('disabled', true).text("Invalid code");
												}
											} else {
												$("#validation1").prop('disabled', true).text("Code expired");
											}

										}

							);
						})
						</script>
			  </div>
			</div>


		<script>
		var modal1 = document.getElementById('myModal');
		var button = document.getElementById("add_capteur");
		var span = document.getElementsByClassName("close")[0];
		button.onclick = function() {
   			modal1.style.display = "block";
		}
		span.onclick = function() {
    		modal1.style.display = "none";
		}
		window.onclick = function(event) {
    		if (event.target == modal1) {
        		modal1.style.display = "none";
    		}
		}
		</script>
	</body>
</html>
