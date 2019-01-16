<?php

session_start();

// if(!isset($_SESSION["connected"]) || $_SESSION["connected"] == "false") {
//     header("Location: views/inscription.php");
// }

require_once __DIR__."/../controllers/piece.php";

if (isset($_GET['piece']) && $_GET['piece'] != "") {
	$piece = getPiecesByID($_GET['piece']);
	if (count($piece) == 0) {
		header("Location: domicile.php");		
	}
	$_SESSION['piece_id'] = $_GET['piece'];
} else {
header("Location: domicile.php");
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../public/css/piece1.css" />
		<link rel="icon" type="image/png" href="../public/assets/favicon.png" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
		<title>Domisep: Pièce </title>

	</head>

	<body>
		<div id="bandeau">
			<div class="logo">

					<a href="domicile.php"> <img src="../public/assets/logo.png" alt = "Logo Domisep" id="logo" title = "Logo Domisep"  />

			</div>

			<div class="bandeau-droite">

					<a href= "aide_accueil.php" class = "aide"> Aide </a>
                    <a href= "inscription.php"  class = "deconnexion" > Déconnexion</a>

            </div>
		</div>

		<div id="slogan">
			<h1>
				Je contrôle mes capteurs !
			</h1>
		</div>

		</div>
		<div id='tab1'>
			<?php echo "<a href='domicile.php?dom=".$_SESSION['domicile_id']."' style='text-decoration: none;color: #515659;'><i class='fa fa-arrow-circle-left fa-lg'></i> <b>Retour</b></a>";?>

		
			<div class="sensor-left">
				<h1 class="titre"><i class="fa fa-microchip fa-sm"></i> Capteurs</h1>
					<ul class="sensor-ul-top" id="capt">
						<?php
						require_once __DIR__.'/../controllers/capteur.php';
						$capteurs = getCapteursControllerPIECE($_SESSION['piece_id']);
						if (count($capteurs) == 0) {
							echo "<li><i class='fa fa-exclamation-triangle'></i> Vous n'avez pas encore de capteurs pour cette pièce.</li>";
						} else {
							foreach ($capteurs as $capteur) {
								echo "<li class=liste id='element-".$capteur[0]."'><span id='display-".$capteur[0]."'>Nom: ".$capteur[1]."<br>Type: ".$capteur[2]."<br>Etat: ".$capteur[3]."</span>
								</br></br><form method='post' action='../controllers/action.php'>
								<input type='hidden' value=".$capteur[0]." name='capteur' id='capteur'/>
								<input type='hidden' value='capt_info' name='action' id='action'/>
								<button>Informations </button>
								</form>
								<input type='hidden' value=".$capteur[0]." name='capteur' id='capteur'/>
								<input type='hidden' value='capt_delete' name='action' id='action'/>
								<button type='submit' id='del-".$capteur[0]."'>Supprimer</button>
								<input type='hidden' value=".$capteur[0]." name='capteur' id='capteur'/>
								<input type='hidden' value='capt_change' name='action' id='action'/>
								<button type='submit' id='change-".$capteur[0]."'>Changer</button>
								</li>
								<script>
									$('#change-".$capteur[0]."').click(function() {
										  $.post('../controllers/action.php',
										  {
											action: 'capt_change',
											capteur: '".$capteur[0]."'
										  },
										  function(data, status){
											if (status == 'success') {
												if ($('#display-".$capteur[0]."').text().includes('OFF')) {
													$('#display-".$capteur[0]."').html('Nom: ".$capteur[1]."<br>Type: ".$capteur[2]."<br>Etat: ON');
												} else {
													$('#display-".$capteur[0]."').html('Nom: ".$capteur[1]."<br>Type: ".$capteur[2]."<br>Etat: OFF');
												}
											}
										  });
									});

									$('#del-".$capteur[0]."').click(function() {
										if (confirm('Etes-vous sûr de vouloir supprimer ce capteur ?')) {	
											$.post('../controllers/action.php',
											{
											action: 'capt_delete',
											capteur: '".$capteur[0]."'
											},
											function(data, status){
											if (status == 'success') {
												$('#element-".$capteur[0]."').remove();
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
				<h1 class="titre"><i class="fa fa-cogs fa-sm"></i> Controleurs</h1>
					<ul class="sensor-ul-bottom" id="cont">
						<?php
							$controleurs = getControleursControllerPIECE($_SESSION['piece_id']);
							if (count($controleurs) == 0) {
								echo '<li><i class=\'fa fa-exclamation-triangle\'></i> Vous n\'avez pas encore de controleurs pour cette pièce.</li>';
							} else {
								foreach ($controleurs as $controleur) {
									echo "<li class=liste id='element-".$controleur[0]."'><span id='display-".$controleur[0]."'>Nom: ".$controleur[1]."<br>Type: ".$controleur[2]."<br>Valeur: ".$controleur[3]."</span>
									</br></br><form method='post' action='../controllers/action.php'>
									<input type='hidden' value=".$controleur[0]." name='capteur' id='capteur'/>
									<input type='hidden' value='cont_info' name='action' id='action'/>
									<button type='submit'>Informations</button>
									</form>
									<input type='hidden' value=".$controleur[0]." name='capteur' id='capteur'/> 
									<input type='hidden' value='cont_delete' name='action' id='action'/>
									<button type='button' id='del-".$controleur[0]."'>Supprimer</button><br>
									<input type='hidden' value=".$controleur[0]." name='capteur' id='capteur'/> 
									<input type='hidden' value='cont_change' name='action' id='action'/>
									<input type='range' class='cont-val' id='change-".$controleur[0]."' name='cont-val' min='0' max='100' step='5' value=".$controleur[3].">
									</li>
									<script>
									$('#change-".$controleur[0]."').change(function() {
										  $.post('../controllers/action.php',
										  {
											action: 'cont_change',
											capteur: '".$controleur[0]."',
											'cont-val': $(this).val()
										  },
										  function(data, status){
											if (status == 'success') {
												$('#display-".$controleur[0]."').html('Nom: ".$controleur[1]."<br>Type: ".$controleur[2]."<br>Valeur: '+$('#change-".$controleur[0]."').val());
											}
										  });
									});

									$('#del-".$controleur[0]."').click(function() {
										if (confirm('Etes-vous sûr de vouloir supprimer ce controleur ?')) {
											$.post('../controllers/action.php',
											{
											action: 'cont_delete',
											capteur: '".$controleur[0]."',
											},
											function(data, status){
											if (status == 'success') {
												$('#element-".$controleur[0]."').remove();
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
			<input id='add_capteur' type="button"  value='+' />
		</div>



		<div class="modal1" id="myModal">
			<div class="modal-content">
				<span class="close">&times;</span>
    			<h2>Ajouter un capteur</h2>
				<form method="post" action="../controllers/capteur.php">
						<input class="input" type="text" name="name" id="name" placeholder="Nom du capteur" size="30" maxlength="20"/ required>
                        <input class="input" type="text" name="ref" id="ref" placeholder="Clé du capteur" size="30" maxlength="20" required/>
						<select class="input" id="capteur" name="capteur">
							<option value="hum">Capteur d'humidité</option>
							<option value="temp">Capteur de température</option>
							<option value="fum">Capteur de fumée</option>
							<option value="lum">Controleur de luminosité</option>
							<option value="vol">Controleur de volet</option>
							<option value="ch">Controleur de chauffage</option>
						</select>
						<button id ="validation1" type="submit">valider</button>
				</form>
						<script>
						$("#ref").on('input', function() {
							var ref = $('#ref').val();
							var regExp = /^[a-z0-9]+$/i;
							if (regExp.test($('#ref').val()) && ref.length >= 8) {	
								$("#validation1").prop('disabled', false).text("Valider");
								return		
							}
							else {
								$("#validation1").prop('disabled', true).text("Code invalide");
								return	
							}

							$.post('../controllers/capteur.php',
										{
										  reference: ref
										},
										function(data, status, req){
											$exists = req.getResponseHeader('Sensor-exists');
											if ($exists == "false") {
												$("#validation1").prop('disabled', false);		
												$("#validation1").text("Valider");
											} else {
												$("#validation1").prop('disabled', true);		
												$("#validation1").text("Code expiré");
											}
										});
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

<footer>

<div class = 'info_footer'> 
	<div>Powered by 
<a href = "jala.php"> <img id="logo_JALA" src="../public/assets/logo_JALA.png" alt = "Logo JALA" title = "Logo JALA"/></a>
©</div>
  <a href= 'mentionslegales.php' style="color: grey; text-decoration: none;"> Mentions Légales </a> 
  <a href= 'cgu.php' style="color: grey; text-decoration: none;"> Conditions Générales </a> 


</div>


</footer>




		<!-- <script>
		var modal2 = document.getElementById('myModal2');
		var button1 = document.getElementById('informations');
		var span2 = document.getElementsByClassName("close")[0];
		button1.onclick = function() {
   			modal2.style.display = "block";
		}
		span2.onclick = function() {
    		modal2.style.display = "none";
		}		
		window.onclick = function(event) {
    		if (event.target == modal2) {
        		modal2.style.display = "none";
    		}
		}
		</script> -->






</html>
