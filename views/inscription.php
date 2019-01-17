<?php

session_start();
session_unset();

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../public/css/inscription.css" />
		<link rel="icon" type="image/png" href="../public/assets/favicon.png" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
		<title>Domisep : Inscription</title>
	</head>

	<body>
		<div id="bandeau">
			<div class="logo">
				
					<a href="accueil.php"> <img src="../public/assets/logo.png" alt = "Logo Domisep" id="logo" title = "Logo Domisep"/>
		
			</div>

				<div id="bandeau_droite">
						<div class="language">
								<a href= "aide_accueil_ENG.php" style = "text-decoration: none; color: #515659"	> ENG </a>
							</div>
						<div class="aide">
								<a href= "aide_accueil.php" style = "text-decoration: none; color: #515659"	> Aide </a>
							</div>
						
						<div class="contact">
							<a href="contact.php" style = "text-decoration: none; color: #515659"> Contact </a>
						</div>
						<div class="connexion1">
							<a href="inscription.php" style = "text-decoration: none; color: #515659"> Connexion </a>
						</div>
						
				
			</div>
		
		</div>


		<div id="slogan">
			<h1>
				Connectez-vous !
			</h1>
		</div>
		<div id="conteneur">
			<div class="connexion">
				<h1 class="titre">
					<i class="fa fa-sign-in-alt fa-sm"></i> Connexion
				</h1>
				<?php
				try {
					$error = $_GET['error'];
					if (isset($error) && $error == "credentials") {
						echo "<p style='color:red'>Email ou mot de passe erroné.</p>";
					}
				} catch (Exception $e) {}
				?>
    			<form class="conn-form" method="post" action="../controllers/authentification.php">
            		<input class="input" type="email" name="email1" id="email1" placeholder="email@example.com" size="30" maxlength="100" required/>
            		<input class="input" type="password" name="pass" id="pass" placeholder="********" size="30" maxlength="100" required/>
        			<input class="input button" type="submit" value="Se connecter"/>
				   </form>
				   <a href="password.php" style="text-decoration: none; color: #515659;">Mot de passe oublié</a>
   			</div>
			<div class="inscription">
				<h1 class="titre">
				<i class="fa fa-user-alt fa-xs"></i> Inscription
				</h1>
				<?php
				try {
					$error = $_GET['error'];
					if (isset($error) && $error == "alreadyexists") {
						echo "<p style='color:red'>Cet email existe déjà.</p>";
					}
				} catch (Exception $e) {}
				?>
				<form method="post" action="../controllers/inscription.php">
            		<input class="input" type="text" name="nom" id="nom" placeholder="Nom" size="30" maxlength="30" required />
            		<input class="input" type="text" name="prénom" id="prénom" placeholder="Prenom" size="30" maxlength="30" required />
            		<input class="input" type="email" name="email2" id="email2" placeholder="email@example.com" size="30" maxlength="30" required />
            		<input class="input" type="text" name="adresse" id="adresse" placeholder="Adresse postale" size="30" maxlength="40" required />
       				<select class="input" name="pays" id="pays" required >
          			<option value="france">France</option>
       				</select>
       				<select class="input" name="ville" id="ville" required>
					<option value="Paris">Paris</option>
           			<option value="Lyon">Lyon</option>
           			<option value="Marseille">Marseille</option>
           			<option value="Lille">Lille</option>
           			<option value="Bordeaux">Bordeaux</option>
           			<option value="Nantes">Nantes</option>
       				</select>
            		<input class="input" type="tel" name="tel" id="tel" placeholder="+33 (0)6 00 00 00 00" size="30" maxlength="10" required />
            		<input class="input" type="text" name="cle" id="cle" placeholder="xxxxxx-xxxxxx-xxxxxx-xxxxxx" size="30" maxlength="20" required />
        			<input class="input button" type="submit" value="S'inscrire"/>
				   </form>
			   </div>
				</div>


	</body>

	

</html>
