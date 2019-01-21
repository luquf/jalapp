<?php

session_start();
$_SESSION['lang'] = "en";

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
		<link rel="stylesheet" href="../../public/css/ajoutdomicile.css" />
		<link rel="icon" type="image/png" href="../../public/assets/favicon.png" />
		<link rel="stylesheet" href="../../public/assets/fontawesome-free-5.6.3-web/css/all.css" />
		<title>Domisep : Add home</title>
	</head>

<body>


	</div>


		<div id="bandeau">

			<div class="logo">
				<a href="domicile.php"> <img id="logo" src="../../public/assets/logo.png" alt = "Logo Domisep" title = "Logo Domisep" />
			</div>




			<div id="bandeau_droite">

					<div class="language">
					<a href= "../ajoutdomicile1.php" style = "text-decoration: none; color: #fff"	> <img src="../../public/assets/france.svg"> ENG </a>
						</div>

					<div class="aide">
						<a href= "aide_accueil.php" style = "text-decoration: none; color: #515659"	> Help </a>
					</div>
					<div class="settings">
						<a href= "user_settings.php" style = "text-decoration: none; color: #515659"> Settings </a>
					</div>
					<div class="connexion">
						<a href="inscription.php" style = "text-decoration: none; color: #515659"> Logout </a>
					</div>


				</div>

		</div>


		<div class="boutton">

			<div class="button_container">
			<button id = "button_modal">+ </button>
			</div>

			<div class="textboutton"> Add a home </div>

		</div>

		<div class="modal1" id="myModal">
			<div class="modal-content">
				<span class="close">&times;</span>
    			<h2>Add a home</h2>
				<form method="post" action="../../controllers/domicile.php">
                        <input class="input" type="type" name="name" id="name" placeholder="Name" maxlength="20" required/>
                        <input type='hidden' value='domicile_add' name='action' id='action'/>
						<button id ="validation1" type="submit">Add</button>
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
