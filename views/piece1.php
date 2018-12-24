<?php

session_start();

// if(!isset($_SESSION["connected"]) || $_SESSION["connected"] == "false") {
//     header("Location: views/inscription.php");
// }

if (isset($_GET['piece'])) {
	$_SESSION['piece_id'] = $_GET['piece'];
} else {
	header("Location: domicile.php");
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<script src="../public/js/addonglet.js" type="text/javascript"></script>
		<link rel="stylesheet" href="../public/css/piece1.css" />
		<link rel="icon" type="image/png" href="../public/assets/favicon.png" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
		<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js'></script>
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
					<ul class="sensor-ul-top">
						<?php
						require_once __DIR__.'/../controllers/capteur.php';
						$capteurs = getCapteursController($_SESSION['piece_id']);
						if (count($capteurs) == 0) {
							echo "<li><i class='fa fa-exclamation-triangle'></i> Vous n'avez pas encore de capteurs pour cette pièce.</li>";
						} else {
							foreach ($capteurs as $capteur) {
								echo "<li class= liste>".$capteur[1]."-".$capteur[2]."-".$capteur[3]."
								<form method='post' action='../controllers/action.php'>
								<input type='hidden' value=".$capteur[0]." name='capteur' id='capteur'/>
								<input type='hidden' value='capt_info' name='action' id='action'/>
								<input id='informations' type='button' value = 'informations'/>
								</form>
								<form method='post' action='../controllers/action.php'>
								<input type='hidden' value=".$capteur[0]." name='capteur' id='capteur'/>
								<input type='hidden' value='capt_delete' name='action' id='action'/>
								<button type='submit'>supprimer</button>
								</form>
								<form method='post' action='../controllers/action.php'>
								<input type='hidden' value=".$capteur[0]." name='capteur' id='capteur'/>
								<input type='hidden' value='capt_change' name='action' id='action'/>
								<button type='submit'>changer</button>
								</form>
								</li>";
							}
						}
						?>
					</ul>
			</div>


			<div class="sensor-right">
				<h1 class="titre"><i class="fa fa-cogs fa-sm"></i> Controleurs</h1>
					<ul class="sensor-ul-bottom">
						<?php
							$controleurs = getControleursController($_SESSION['piece_id']);
							if (count($controleurs) == 0) {
								echo "<li><i class='fa fa-exclamation-triangle'></i> Vous n'avez pas encore de controleurs pour cette pièce.</li>";
							} else {
								foreach ($controleurs as $controleur) {
									echo "<li class = liste>".$controleur[1]."-".$controleur[2]."-".$controleur[3].
									"<form method='post' action='../controllers/action.php'>
									<input type='hidden' value=".$controleur[0]." name='capteur' id='capteur'/>
									<input type='hidden' value='cont_info' name='action' id='action'/>
									<input id='informations' type='button' value = 'informations'/>
									</form>
									<form method='post' action='../controllers/action.php'>
									<input type='hidden' value=".$controleur[0]." name='capteur' id='capteur'/> 
									<input type='hidden' value='cont_delete' name='action' id='action'/>
									<button type='submit'>supprimer</button>
									</form>
									<form method='post' action='../controllers/action.php'>
									<input type='hidden' value=".$controleur[0]." name='capteur' id='capteur'/> 
									<input type='hidden' value='cont_change' name='action' id='action'/>
									<input type='range' id='cont-val' name='cont-val'min='0' max='100' step='5' value=".$controleur[3].">
									<button type='submit'>changer</button>
									</form>
									</li>";
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
						<input class="input" type="text" name="name" id="name" placeholder="Nom du capteur" size="30" maxlength="10"/>
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




<div class="modal2" id="myModal2">
			<div class="modal-content2">
				<span class="close">&times;</span>
				<?php echo"
    			
					<div class='infos'>
					<h2>Info de " .$capteur[1]."</h2>
						<span>Numéro de série : </span>".$capteur[0]."
						<br/><span>Type : </span>".$capteur[2]."
						<br/><span>Emplacement : </span>".$capteur[4]."
					</div>
					
				<div class ='historique'>
				<h2> Historique de ".$capteur[1]." </h2>"
				?>
				<?php
					require __DIR__ . '/../controllers/releve.php';

					$releve_capteur = getDataCapteur();
					echo "
					<div class='datas'>
					<form method='post' action='../controllers/releve.php'>
					<span>".$releve_capteur[1]." : </span>".$releve_capteur[3]."
					</form>
					</div>
					"
					?>
				</div> 
			</div>
</div>




		<script>
		var modal2 = document.getElementById('myModal2');
		var button1 = document.getElementById('informations');
		var span = document.getElementsByClassName("close")[0];
		button1.onclick = function() {
   			modal2.style.display = "block";
		}
		span.onclick = function() {
    		modal2.style.display = "none";
		}		
		window.onclick = function(event) {
    		if (event.target == modal2) {
        		modal2.style.display = "none";
    		}
		}
		</script>





	</body>
</html>
