<?php

session_start();

if (!isset($_SESSION["connected"]) || $_SESSION["connected"] == "false") {
    header("Location: inscription.php");
    exit();
} else {
    if (isset($_SESSION["is_admin"]) && $_SESSION["is_admin"] == 1) {
        header("Location: admin_interface.php");
        exit();
    }
}

?>

<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../public/css/ajoutdomicile.css" />
		<link rel="icon" type="image/png" href="../public/assets/favicon.png" />
		<link rel="stylesheet" href="../public/assets/fontawesome-free-5.6.3-web/css/all.css" />
		<title>Domisep : Ajout domicile</title>
	</head>

<body>


	</div>


		<div id="bandeau">

			<div class="logo">
				<a href="domicile.php"> <img id="logo" src="../public/assets/logo.png" alt = "Logo Domisep" title = "Logo Domisep" />
			</div>




			<div id="bandeau_droite">

					<div class="language">
					<a href= "aide_accueil_ENG.php" style = "text-decoration: none; color: #fff"	> <img src="../public/assets/usa.svg"> ENG </a>
						</div>

					<div class="aide">
						<a href= "aide_accueil.php" style = "text-decoration: none; color: #515659"	> Aide </a>
					</div>
					<div class="settings">
						<a href= "user_settings.php" style = "text-decoration: none; color: #515659">Réglages</a>
					</div>
					<div class="connexion">
						<a href="inscription.php" style = "text-decoration: none; color: #515659"> Déconnexion </a>
					</div>


				</div>

		</div>


		<div class="boutton">

			<div class="button_container">
			<button id = "button_modal">+ </button>
			</div>

			<div class="textboutton"> Ajouter un domicile </div>

		</div>

		<div class="modal1" id="myModal">
			<div class="modal-content">
				<span class="close">&times;</span>
    			<h2>Ajouter un domicile</h2>
				<form method="post" action="../controllers/domicile.php">
                        <input class="input" type="type" name="name" id="name" placeholder="Nom du domicile" maxlength="20" required/>
                        <input type='hidden' value='domicile_add' name='action' id='action'/>
						<button id ="validation1" type="submit">Valider</button>
				</form>
			  </div>
		</div>


		<script>
		var modal1 = document.getElementById('myModal');
		var button = document.getElementById("button_modal");
		var span = document.getElementsByClassName("close")[0];
		button.onclick = function() {
   			modal1.style.display = "block";
		}
		span.onclick = function() {
    		modal1.style.display = "none";
		}
		validation1.onclick()=function(){
			modal1.style.display="none";
		}

		window.onclick = function(event) {
    		if (event.target == modal1) {
        		modal1.style.display = "none";
    		}
		}

		</script>


</body>

</html>
