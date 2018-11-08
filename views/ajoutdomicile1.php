<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../public/css/ajoutdomicile.css" />
		<title>Domisep : Ajout d'un premier domicile</title>
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

			<div class="deconnexion">
					<a href="accueil.php" style="color: #fff; text-decoration: none;"> Déconnexion </a>
			</div>
			
		</div>

		<div>
			<div>
				<input type="button" class="boutton" value="+" onclick="msg()">
			</div>
			<div class="textboutton"> Ajouter un domicile </div>
			</div>

		</div>
	</body>