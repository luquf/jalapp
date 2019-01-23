<?php
session_start();
$_SESSION['lang'] = "fr";
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../../public/css/aide_accueil.css" />
		<link rel="icon" type="image/png" href="../../public/assets/favicon.png" />
		<link rel="stylesheet" href="../../public/assets/fontawesome-free-5.6.3-web/css/all.css" />
		<title>Domisep : Frequently asked Questions</title>
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
					<a href= "../aide_accueil.php"> <img src="../../public/assets/france.png" id="language"></a>
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


		<div id="FAQ">
			<div id ="titre_FAQ">
			<h1>
				FAQ
			</h1>
</div>
			<div class = "question">
			<h2>
			1. I am interested in Domisep, how can I get started ? </h2> </div>
			<p class = "answer">
			Domisep only manages its own sensors and controllers. You need to get one or more of the 6 sensors and / or controllers available in most of all the high-tech supermarkets (Fnac, Darty, Boulanger, etc.).
These sensors and controllers can exclusively be manage from our website (also exists in mobile version) and are recognized directly through their unique serial numbers.
			</p>
			<h2 class = "question" >
			2. I bought my Domisep sensor(s), what's next ? </h2>
			<p class = "answer">
			You must now register on our website. It could not be easier ! Fill in all the fields and tell us the user key you were given when you bought your first domisep sensor.
<br> Your password will be immediately communicated to you by email. You can then connect.
			</p>
			<h2 class = "question" >
			3. How to use Domisep ? </h2>
			<p class = "answer">
			When you first connect to domisep.ovh, you will need to create and name a home first. In this home, you will be able to create and name rooms, those in which you installed domisep sensors.
Then you can add, in each of these rooms, all the sensors domisep you bought. You can also name them to personalize and facilitate your navigation on the domisep site.
<br> Once the sensors are added, you can control them using your computer, phone or tablet.
<br> <br> You now have all the necessary informations, enjoy DOMISEP !
			</p>

			<div class = "cgu">
				<a href= "cgu.php"	> Conditions générales d'utilisation </a>
				<p>&</p><a href= "mentionslegales.php"	> Legal Mentions  </a>
</div>
		</div>

	</body>




</html>
