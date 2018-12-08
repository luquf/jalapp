<?php

session_start();
session_destroy();

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

			<div class=bandeau-droite>

			<div class="aide">
					<a href= "aide_accueil.php"style="text-decoration:none">Aide </a>
			</div>

		</div>
		
		</div>



		<div id="conteneur">
			<div class="connexion">
				<h1 class="titre">
					<i class="fa fa-sign-in-alt fa-sm"></i> Connexion
				</h1>
    			<form class="conn-form" method="post" action="../controllers/authentification.php">
            		<input class="input" type="email" name="email1" id="email1" placeholder="email@example.com" size="30" maxlength="100" />
            		<input class="input" type="password" name="pass" id="pass" placeholder="********" size="30" maxlength="100" />
        			<input class="input button" type="submit" value="Se connecter"/>
				   </form>
   			</div>
			<div class="inscription">
				<h1 class="titre">
				<i class="fa fa-user-alt fa-xs"></i> Inscription
				</h1>
				<form method="post" action="../controllers/inscription.php">
            		<input class="input" type="text" name="nom" id="nom" placeholder="Nom" size="30" maxlength="30" />
            		<input class="input" type="text" name="prénom" id="prénom" placeholder="Prenom" size="30" maxlength="30" />
            		<input class="input" type="email" name="email2" id="email2" placeholder="email@example.com" size="30" maxlength="30" />
            		<input class="input" type="text" name="adresse" id="adresse" placeholder="Adresse postale" size="30" maxlength="40" />
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
            		<input class="input" type="tel" name="tel" id="tel" placeholder="+33 (0)6 00 00 00 00" size="30" maxlength="10" />
            		<input class="input" type="text" name="cle" id="cle" placeholder="xxxxxx-xxxxxx-xxxxxx-xxxxxx" size="30" maxlength="20" />
        			<input class="input button" type="submit" value="S'inscrire"/>
				   </form>
   			</div>

	</body>
