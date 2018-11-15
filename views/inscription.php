<?php


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
					<a href="accueil.php"> <img src="../public/assets/logo.png" alt = "Logo Domisep" title = "Logo Domisep" style="width: 150px; height: auto;" /> 
				</p>
			</div>
			<div class="aide">
				<p>
				</br>	
					<select name="Langue" id="Langue" >
						<option value="Français">Français</option>
						<option value="English">English</option>
						</select>
					<a href= "aide_accueil.php" style="color: #fff; text-decoration: none;">Aide </a> 
				</p>
			</div>
			
		</div>
	</br>
</br>
</br>
</br>

		<div id="conteneur">
			<div class="connexion"> 
				<h1>
					Me Connecter 
				</h1>
    			<form method="post" action="../controllers/authentification.php">
    			<p>
            		<input type="email" name="email1" id="email1" placeholder="Email" size="30" maxlength="100" />
        		</p>
        		<p>
            		<input type="password" name="pass" id="pass" placeholder="Mot de Passe" size="30" maxlength="100" />
        		</p>
   				<p>
      		 		Se souvenir de moi
       				<input type="checkbox" name="souvenir" id="souvenir" />
       			</p>
        		<p>
        			<input type="submit" value="Valider"/>
   				</p>
   			</div>
			<div class="inscription">  
				<h1>
					M'Inscrire
				</h1>
				<form method="post" action="../controllers/authentification.php">
				<p>
            		<input type="text" name="nom" id="nom" placeholder="Nom" size="40" maxlength="30" />
        		</p>
        		<p>
            		<input type="text" name="prénom" id="prénom" placeholder="Prénom" size="40" maxlength="30" />
        		</p>
    			<p>
            		<input type="email" name="email2" id="email2" placeholder="Email" size="40" maxlength="30" />
        		</p>
        		<p>
            		<input type="text" name="adresse" id="adresse" placeholder="Adresse" size="40" maxlength="40" />
        		</p>
        		<p>
       				<select name="pays" id="pays" >
           			<option value="Pays">Pays</option>
          			<option value="france">France</option>
       				</select>
        		</p>
        		<p>
       				<select name="ville" id="ville" >
           			<option value="Ville">Ville</option>
          			<option value="Paris">Paris</option>
           			<option value="Lyon">Lyon</option>
           			<option value="Marseille">Marseille</option>
           			<option value="Lille">Lille</option>
           			<option value="Carrière-sur-Seine">Carrière-sur-Seine</option>
           			<option value="Bordeaux">Bordeaux</option>
           			<option value="Nantes">Nantes</option>
       				</select>
        		</p>
        		<p>
            		<input type="tel" name="tel" id="tel" placeholder="Numéro de Téléphone" size="40" maxlength="10" />
        		</p>
        		<p>
            		<input type="text" name="cle" id="cle" placeholder="Clé client (unique)" size="40" maxlength="20" />
        		</p>
        		<p>
        			<input type="submit" value="Valider"/>
   				</p>
   			</div>

	</body>
