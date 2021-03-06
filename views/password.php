<?php
session_start();
$_SESSION['lang'] = "fr";
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../public/css/password.css" />
		<link rel="icon" type="image/png" href="../public/assets/favicon.png" />
		<link rel="stylesheet" href="../public/assets/fontawesome-free-5.6.3-web/css/all.css" />
		<title>Domisep : Réinitialiser le Mot de Passe</title>
	</head>

	<body>
		<div id="bandeau">
			<div class="logo">

					<a href="domicile.php"> <img src="../public/assets/logo.png" alt = "Logo Domisep" id="logo" title = "Logo Domisep"/>

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
					<a href= "en/password.php"> <img src="../public/assets/usa.png" id = "language"></a>
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
				Mot de passe oublié ?
			</h1>
		</div>
        <div class="champ-email">
            <form method="post" action="../controllers/password.php">
				<?php
if (isset($_GET['error'])) {
    if ($_GET['error'] == "ok") {
        echo "<p style='color: green; font-weight: bold; text-align: center;'>Veuillez trouver votre nouveau mot de passe dans vos emails.</p>";
    } else if ($_GET['error'] == "notfound") {
        echo "<p style='color: red; font-weight: bold; text-align: center;'>Cet email n'existe pas.</p>";
    }
}
?>
                <input class="input" type="email" name="email" id="email" placeholder="email@example.com" size="30" maxlength="100" required/>
        		<input class="input button" type="submit" value="Réinitialiser"/>
            </form>
        </div>
    </body>

</html>