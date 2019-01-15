<?php

session_start();

// if(!isset($_SESSION["connected"]) || $_SESSION["connected"] == "false") {
//     header("Location: inscription.php");
// }

?>

<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../public/css/ajoutdomicile.css" />
		<link rel="icon" type="image/png" href="../public/assets/favicon.png" />
		<title>Domisep : Ajout domicile</title>
	</head>

<body>

	</div>


		<div id="bandeau">

			<div class="logo">
				<a href="domicile.php"> <img id="logo" src="../public/assets/logo.png" alt = "Logo Domisep" title = "Logo Domisep" />
			</div>

			<div id="bandeau_droite" >
					<div class="aide">
						<a href= "aide_accueil.php" style="text-decoration: none; color: #515659"> Aide </a>
					</div>
				<div class="deconnexion">
					<a href="inscription.php" style="text-decoration: none; color: #515659"> Déconnexion </a>
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

<html>


<footer>

	<div class="info_footer"> 

			<div>Powered by 
		<a href = "jala.php"> <img id="logo_JALA" src="../public/assets/logo_JALA.png" alt = "Logo JALA" title = "Logo JALA"/></a>
		©</div>
			<a href= 'mentionslegales.php' style="color: grey; text-decoration: none;"> Mentions Légales </a> 
			<a href= 'cgu.php' style="color: grey; text-decoration: none;"> Conditions Générales </a> 


	</div>

</footer>


</html>