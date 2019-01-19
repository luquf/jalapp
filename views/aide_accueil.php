<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../public/css/aide_accueil.css" />
		<link rel="icon" type="image/png" href="../public/assets/favicon.png" />
		<title>Domisep : Foire aux Questions</title>
	</head>

	<body>
		<div id="bandeau">
				<div class="logo">
						<a href="domicile.php" style="text-decoration:none"> <img src="../public/assets/logo.png" alt = "Logo Domisep" id="logo" title = "Logo Domisep" />

				</div>
				
				
				<?php
					session_start();
					$text = "";
					if ($_SESSION["connected"] == "true") {
						$text = "Déconnexion";
					} else {
						$text = "Connexion";
					}
				?>

				<div id="bandeau_droite">
					<div class="language">
					<a href= "aide_accueil_ENG.php" style = "text-decoration: none; color: #fff"	> <img src="../public/assets/usa.svg"> ENG </a>
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
			Il vous faut maintenant vous inscrire
			</p>
			<h2 class = "question" >
			3. Comment utiliser Domisep ? </h2>
			<p class = "answer">
			dem aut ipse doctrinis fuisset instructior est enim, quod tibi ita videri necesse est, non satis politus iis artibus, quas qui tenent, eruditi appellantur aut ne deterruisset alios a studiis. quamquam te quidem video minime esse deterritum.
Novitates autem si spem adferunt, ut tamquam in herbis non fallacibus fructus appareat, non sunt illae quidem repudiandae, vetustas tamen suo loco conservanda; maxima est enim vis vetustatis et consuetudinis. Quin in ipso equo, cuius modo feci mentionem, si nulla res impediat, nemo est, quin eo, quo consuevit, libentius utatur quam intractato et novo. Nec vero in hoc quod est animal, sed in iis etiam quae sunt inanima, consuetudo valet, cum locis ipsis delectemur, montuosis etiam et silvestribus, in quibus diutius commorati sumus.
			</p>

			<div class = "cgu">
				<a href= "cgu.php"	> Conditions générales d'utilisation </a>
				<p>&</p><a href= "mentionslegales.php"	> Mentions Légales </a>
</div>
		</div>

	</body>




</html>
