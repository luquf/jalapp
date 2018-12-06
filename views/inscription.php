<?php

session_start();
session_destroy();

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../public/css/inscription.css" />
		<title>Domisep : Inscription</title>
	</head>

	<body>
		<div id="bandeau">
			<div class="logo">
				
					<a href="accueil.php"> <img src="../public/assets/logo.png" alt = "Logo Domisep" id="logo" title = "Logo Domisep"/>
		
			</div>

			<div class=bandeau-droite>

			<div class="aide">
					<a href= "aide_accueil.php"style="text-decoration:none">Aide </a>
			</div>

		</div>
		
		</div>



		<div id="conteneur">
			<div class="connexion">
				<h1 class="titre">
					Connexion
				</h1>
    			<form method="post" action="../controllers/authentification.php">
            		<input class="input" type="email" name="email1" id="email1" placeholder="Email" size="30" maxlength="100" />
            		<input class="input" type="password" name="pass" id="pass" placeholder="Mot de passe" size="30" maxlength="100" />
        			<input class="input button" type="submit" value="Se connecter"/>
				   </form>
   			</div>
			<div class="inscription">
				<h1 class="titre">
					Inscription
				</h1>
				<form method="post" action="../controllers/inscription.php">
            		<input class="input" type="text" name="nom" id="nom" placeholder="Nom" size="30" maxlength="30" />
            		<input class="input" type="text" name="prénom" id="prénom" placeholder="Prénom" size="30" maxlength="30" />
            		<input class="input" type="email" name="email2" id="email2" placeholder="Email" size="30" maxlength="30" />
            		<input class="input" type="text" name="adresse" id="adresse" placeholder="Adresse" size="30" maxlength="40" />
       				<select class="input" name="pays" id="pays" >
           			<option value="Pays">Pays</option>
          			<option value="france">France</option>
       				</select>
       				<select class="input" name="ville" id="ville" >
           			<option value="Ville">Ville</option>
          			<option value="Paris">Paris</option>
           			<option value="Lyon">Lyon</option>
           			<option value="Marseille">Marseille</option>
           			<option value="Lille">Lille</option>
           			<option value="Bordeaux">Bordeaux</option>
           			<option value="Nantes">Nantes</option>
       				</select>
            		<input class="input" type="tel" name="tel" id="tel" placeholder="Numéro de téléphone" size="30" maxlength="10" />
            		<input class="input" type="text" name="cle" id="cle" placeholder="Clé client (unique)" size="30" maxlength="20" />
        			<input class="input button" type="submit" value="S'inscrire"/>
				   </form>
   			</div>

	</body>
