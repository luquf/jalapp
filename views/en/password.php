<?php
session_start();
$_SESSION['lang'] = "en";
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../../public/css/password.css" />
		<link rel="icon" type="image/png" href="../../public/assets/favicon.png" />
		<link rel="stylesheet" href="../../public/assets/fontawesome-free-5.6.3-web/css/all.css" />
		<title>Domisep : Reset password</title>
	</head>

	<body>
		<div id="bandeau">
			<div class="logo">

					<a href="domicile.php"> <img src="../../public/assets/logo.png" alt = "Logo Domisep" id="logo" title = "Logo Domisep"/>

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
			<a href= "../password.php"> <img src="../../public/assets/france.png" id = "language"></a>
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
				Forgotten password ?
			</h1>
		</div>
        <div class="champ-email">
            <form method="post" action="../../controllers/password.php">
				<?php
if (isset($_GET['error'])) {
    if ($_GET['error'] == "ok") {
        echo "<p style='color: green; font-weight: bold; text-align: center;'>You will find your new password in your mailbox.</p>";
    } else if ($_GET['error'] == "notfound") {
        echo "<p style='color: red; font-weight: bold; text-align: center;'>This mail address doesn't exist.</p>";
    }
}
?>
                <input class="input" type="email" name="email" id="email" placeholder="email@example.com" size="30" maxlength="100" required/>
        		<input class="input button" type="submit" value="Reset"/>
            </form>
        </div>
    </body>

</html>