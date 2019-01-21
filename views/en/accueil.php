<?php
session_start();
$_SESSION['lang'] = "en";
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../../public/css/accueil.css" />
		<link rel="icon" type="image/png" href="../../public/assets/favicon.png" />
		<link rel="stylesheet" href="../../public/assets/fontawesome-free-5.6.3-web/css/all.css" />
		<title>Domisep : Accueil</title>
	</head>

	<body>
		<div id="bandeau">
				<div class="logo">
						<a href="domicile.php" style="text-decoration:none"> <img src="../../public/assets/logo.png" alt = "Logo Domisep" id="logo" title = "Logo Domisep" />

				</div>

				<?php
					$text = "";
					if ($_SESSION["connected"] == "true") {
						$text = "Déconnexion";
					} else {
						$text = "Connexion";
					}
				?>

				<div id="bandeau_droite">
				<div class="language">
							<a href= "../../accueil.php" style = "text-decoration: none; color: #fff"	> <img src="../../public/assets/france.svg"> ENG </a>
						</div>
						<div class="aide">
							<a href= "aide_accueil.php" style = "text-decoration: none; color: #515659"	> Aide </a>
						</div>
						<div class="contact">
						<a href="contact.php" style = "text-decoration: none; color: #515659"> Contact </a>
					</div>
					<div class="connexion">
						<a href="inscription.php" style = "text-decoration: none; color: #515659"> <?php echo $text; ?> </a>
					</div>



				</div>


		</div>


		<div id="slogan">
			<h1>
				Domisep : La domotique en un clic !
			</h1>
		</div>


		<div id="apropos" style="text-align:center;">
			<h3 class = "titre_apropos">
				A propos
			</h3>
			<h4>Bienvenue chez Domisep, un service de domotique intelligent ! </h4>
			<h4>Cette plateforme est une plateforme réalisée pour un projet étudiant et n'est donc pas un vrai produit !</h4>
			<div class="bulletpoints">
					- Contrôlez vos lampes, chauffages, volets à distance depuis un ordinateur ou un smartphone</br>
					- Choisissez parmi 6 différents controlleurs/capteurs pour toutes vos pièces</br>
					- Gérez une ou plusieurs maison. </br>
					- Accèdez facilement à vos informations de consommation.</br>
			</div>
			<div class="cgu">
				<a href="cgu.php"> Conditions générales d'utilisation </a>
			</div>
			<div class="cgu">
				<a href= "mentionslegales.php"> Mentions Légales </a>
			</div>
		</div>

	</body>




</html>
