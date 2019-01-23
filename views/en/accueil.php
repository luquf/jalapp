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
		<title>Domisep : Home</title>
	</head>

	<body>
		<div id="bandeau">
				<div class="logo">
						<a href="domicile.php" style="text-decoration:none"> <img src="../../public/assets/logo.png" alt = "Logo Domisep" id="logo" title = "Logo Domisep" />

				</div>

				<?php
					$text = "";
					if ($_SESSION["connected"] == "true") {
						$text = "Logout";
					} else {
						$text = "Login";
					}
				?>

				<div id="bandeau_droite">
				<div class="language">
						<a href= "../accueil.php"> <img src="../../public/assets/france.png" id="language"></a>
						</div>
						<div class="aide">
							<a href= "aide_accueil.php" style = "text-decoration: none; color: #515659"	> Help </a>
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
				Domisep : Domotic in one click !
			</h1>
		</div>


		<div id="apropos" style="text-align:center;">
			<h3 class = "titre_apropos">
				About
			</h3>
			<h4>Welcome to Domisep, a smart personal domotic service ! </h4>
			<h4>This platform is part of a university project and was created for our engineering studies, it is not made for commercial uses !</h4>
			<div class="bulletpoints">
					- Control your lights, temperature and more from your computer or your smartphone.</br>
					- Choose between 6 sensors/controllers to manage your rooms.</br>
					- Manage one or more house. </br>
					- Easy access your consumption data.</br>
			</div>
			<div class="cgu">
				<a href="cgu.php"> General usage conditions </a>
			</div>
			<div class="cgu">
				<a href= "mentionslegales.php"> Legal mentions </a>
			</div>
		</div>

	</body>




</html>
