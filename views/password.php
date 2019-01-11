<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../public/css/password.css" />
		<link rel="icon" type="image/png" href="../public/assets/favicon.png" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
		<title>Domisep : Inscription</title>
	</head>

	<body>
		<div id="bandeau">
			<div class="logo">
				
					<a href="accueil.php"> <img src="../public/assets/logo.png" alt = "Logo Domisep" id="logo" title = "Logo Domisep"/>
		
			</div>

			<div class=bandeau-droite>

			<div class="aide">
					<a href= "aide_accueil.php"style="text-decoration:none"> Aide </a>
			</div>
			<div class="connexion">
				<a href= "inscription.php"style="text-decoration:none"> Connexion </a>
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
						echo "<p style='color: green; font-weight: bold; text-align: center;'>Veuillez trouverez votre nouveau mot de passe dans vos emails.</p>";
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
	<footer>

		    <div class = 'info_footer'> 
          <div class='inf'> Powered by </div>
          <div class='inf'> <a href = "jala.php"> <img id="logo_JALA" src="../public/assets/logo_JALA.png" alt = "Logo JALA" title = "Logo JALA"/></a></div>
          <div class='inf'>©</div>
        </div>


	</footer>

</html>