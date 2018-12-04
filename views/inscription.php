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
				<p>
					<a href="accueil.php"> <img src="../public/assets/logo.png" alt = "Logo Domisep" id="logo" title = "Logo Domisep"/>
				</p>
			</div>
			<div class="aide">
					<a href= "aide_accueil.php">Aide </a>
			</div>

		</div>


		<div id="conteneur">
			<div class="connexion">
				<h1>
					Me Connecter
				</h1>
    			<form method="post" action="../controllers/authentification.php">
    			<p>
            		<input class="input" type="email" name="email1" id="email1" placeholder="Email" size="30" maxlength="100" />
        		</p>
        		<p>
            		<input class="input" type="password" name="pass" id="pass" placeholder="Mot de Passe" size="30" maxlength="100" />
        		</p>
        		<p>
        			<input class="input" type="submit" value="Se connecter"/>
   				</p>
				   </form>
   			</div>
			<div class="inscription">
				<h1>
					M'Inscrire
				</h1>
				<form method="post" action="../controllers/inscription.php">
				<p>
            		<input class="input" type="text" name="nom" id="nom" placeholder="Nom" size="30" maxlength="30" />
        		</p>
        		<p>
            		<input class="input" type="text" name="prénom" id="prénom" placeholder="Prénom" size="30" maxlength="30" />
        		</p>
    			<p>
            		<input class="input" type="email" name="email2" id="email2" placeholder="Email" size="30" maxlength="30" />
        		</p>
        		<p>
            		<input class="input" type="text" name="adresse" id="adresse" placeholder="Adresse" size="30" maxlength="40" />
        		</p>
        		<p>
       				<select class="input" name="pays" id="pays" >
           			<option value="Pays">Pays</option>
          			<option value="france">France</option>
       				</select>
        		</p>
        		<p>
       				<select class="input" name="ville" id="ville" >
           			<option value="Ville">Ville</option>
          			<option value="Paris">Paris</option>
           			<option value="Lyon">Lyon</option>
           			<option value="Marseille">Marseille</option>
           			<option value="Lille">Lille</option>
           			<option value="Bordeaux">Bordeaux</option>
           			<option value="Nantes">Nantes</option>
       				</select>
        		</p>
        		<p>
            		<input class="input" type="tel" name="tel" id="tel" placeholder="Numéro de Téléphone" size="30" maxlength="10" />
        		</p>
        		<p>
            		<input class="input" type="text" name="cle" id="cle" placeholder="Clé client (unique)" size="30" maxlength="20" />
        		</p>
        		<p>
        			<input class="input" type="submit" value="S'inscrire"/>
   				</p>
				   </form>
   			</div>

	</body>
