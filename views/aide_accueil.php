<?php
session_start();
$_SESSION['lang'] = "fr";
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../public/css/aide_accueil.css" />
		<link rel="icon" type="image/png" href="../public/assets/favicon.png" />
		<link rel="stylesheet" href="../public/assets/fontawesome-free-5.6.3-web/css/all.css" />
		<title>Domisep : Forum aux Questions</title>
	</head>

	<body>
		<div id="bandeau">
				<div class="logo">
						<a href="domicile.php" style="text-decoration:none"> <img src="../public/assets/logo.png" alt = "Logo Domisep" id="logo" title = "Logo Domisep" />

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
					<a href= "en/aide_accueil.php" style = "text-decoration: none; color: #fff"	> <img src="../public/assets/usa.svg"> ENG </a>
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


		<div id="FAQ">
			<div id ="titre_FAQ">
			<h1>
				FAQ
			</h1>
</div>
			<DIV CLASS = "question">
			<h2>
			1. Domisep m'intéresse, comment commencer ? </h2> </div>
			<p class = "answer">
				Domisep gère uniquement ses propre capteurs et ses propres controlleurs. Il vous faut vous procurer un ou plusieurs des 6 capteurs et/ou contrôleurs disponibles dans la majorité des grandes surfaces High-Tech (Fnac, Darty, Boulanger, etc.).
				Ces capteurs et ces contrôleurs Domisep sur utilisables exclusivement depuis notre site web (existe également en version mobile) et sont reconus directement grâce à leurs numéro de série uniques.
			</p>
			<h2 class = "question" >
			2. J'ai acheté mon(mes) capteur(s) Domisep, que faire ensuite? </h2>
			<p class = "answer">
			Il vous faut maintenant vous inscrire sur notre site web. Pour cela, rien de plus simple ! Remplissez tous les champs et indiquez-nous la clé utilisateur qui vous a été fourni à l'achat de votre premier capteur domisep.
			<br> Votre mot de passe vous sera immédiatement communiqué par mail. Vous pourrez ensuite vous connecter. 
			</p>
			<h2 class = "question" >
			3. Comment utiliser Domisep ? </h2>
			<p class = "answer">
			Lors de votre première connexion à domisep.ovh, il vous faudra créer et nommer un premier domicile. Dans ce domicile, vous allez pouvoir créer et nommer des pièces, celles dans lesquelles vous avez installé des capteurs domisep.
			Ensuite vous pourrez ajouter, dans chacunes de ces pièces, tous les capteurs domisep que vous avez acheté. Vous pourrez également les nommer afin de personnaliser et faciliter votre navigation sur le site de domisep.
			<br> Une fois les capteurs ajoutés, vous pourrez les contrôler à l'aide de votre ordinateur, téléphone ou tablette.
			<br><br> A vous de jouer !
			</p>

			<div class = "cgu">
				<a href= "cgu.php"	> Conditions générales d'utilisation </a>
				<p>&</p><a href= "mentionslegales.php"	> Mentions Légales </a>
</div>
		</div>

	</body>




</html>
