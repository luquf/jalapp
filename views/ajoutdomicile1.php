<?php

session_start();

// if(!isset($_SESSION["connected"]) || $_SESSION["connected"] == "false") {
//     header("Location: views/inscription.php");
// }

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../public/css/ajoutdomicile.css" />
		<title>Domisep : Ajout d'un premier domicile</title>
	</head>

	<body>

	</div>


		<div id="bandeau">

			<div class="logo">
				<a href="accueil.php"> <img src="../public/assets/logo.png" alt = "Logo Domisep" title = "Logo Domisep" style="width: 150px; height: auto;" /> 
			</div>

			<div id="bandeau_droite">

				<div class="aide">
					<div>
						<select name="Langue" id="Langue" >
							<option value="Français">Français</option>
							<option value="English">English</option>
						</select>
					</div>

					<div>
						<a href= "aide_accueil.php" style="color: #fff; text-decoration: none;" class="aide">Aide </a>
					</div>

				</div>

				<div class="deconnexion">
					<a href="accueil.php" style="color: #fff; text-decoration: none;"> Déconnexion </a>
				</div>
			</div>
			

		</div>

</br></br></br></br>
		<div class="boutton">

			<div class="button_container">
			<button id = "button_modal" onclick="openModal()">+ </button>
			</div>

			<div class="textboutton"> Ajouter un domicile </div>
			
		</div>

			<div id = "modal">
				<h1> Ajout Domicile</h1>
				<div class="infos"> 
						<form method="post" action="../controllers/domicile.php">
							<p>
								<input type="name" name="name" id="name" placeholder="Nom du domicile : " size="30" maxlength="20"/>
							
							</p>
						
							


			<button id ="close" onclick ="closeModal()">X</button>
			<button id ="validation" onclick ="closeModal()">Valider</button>
			</div>
			<script src="app.js" type="text/javascript"></script>


</body>