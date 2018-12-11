<?php

session_start();

// if(!isset($_SESSION["connected"]) || $_SESSION["connected"] == "false") {
//     header("Location: views/accueil.php");
// }

require_once __DIR__.'/../models/domicile.php';

$dom = getDomiciles($_SESSION['user_id']);
if (!isset($dom[0][0])) {
    header('Location: ../views/ajoutdomicile1.php');
}



?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../public/css/domicile.css" />
		<link rel="icon" type="image/png" href="../public/assets/favicon.png" />
        <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  <script
  src="https://code.jquery.com/jquery-1.9.1.min.js"
  integrity="sha256-wS9gmOZBqsqWxgIVgA8Y9WcQOa7PgSIX+rPA0VL2rbQ="
  crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  		<title>Domisep: Domicile </title>

	</head>

	<body>
		<div id="bandeau">
				<div class="logo">
					<a href="domicile.php"> <img id="logo" src="../public/assets/logo.png" alt = "Logo Domisep" title = "Logo Domisep" />
				</div>

				<div id="bandeau_droite">
						<div class="aide">
							<a href= "aide_accueil.php"> Aide </a>
						</div>
						<div class="settings">
							<a href= "user_settings.php"> Réglages </a>
						</div>
					<div class="deconnexion">
						<a href="inscription.php"> Déconnexion </a>
					</div>
			</div>


		</div>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<div>
		<ul class='tabs'>
		<?php
			require_once __DIR__ . '/../controllers/domicile.php';
			if (isset($_GET['dom'])) {
				$_SESSION['domicile_id'] = $_GET['dom'];
			}
			$domiciles = getDomicilesController($_SESSION['user_id']);
			foreach ($domiciles as $val) {
				echo "<li><a href='domicile.php?dom=" . str_replace(' ', '', $val[0]) . "' id=".str_replace(' ', '', $val[0]).">" . $val[1] . "</a></li>";
			}
		?>

            <li class="button-add"><input id='button' type="button"  value='+'/></li>
        </ul>
        <div class="modal2" id="myModal2">
			<div class="modal-content2">
				<span class="close2">&times;</span>
    			<h2>Ajouter un domicile</h2>
				<form method="post" action="../controllers/domicile.php">
                        <input class="input" type="type" name="name" id="name" placeholder="Nom du domicile" size="30" maxlength="40" required/>
						<button id ="validation2" type="submit">Valider</button>
				</form>
			</div>
		</div>


		<script>
		var modal2 = document.getElementById('myModal2');
		var button = document.getElementById("button");
		var span = document.getElementsByClassName("close2")[0];
		button.onclick = function() {
   			modal2.style.display = "block";
		}
		span.onclick = function() {
    		modal2.style.display = "none";
		}
		window.onclick = function(event) {
    		if (event.target == modal2) {
        		modal2.style.display = "none";
    		}
		}
		</script>
		</div>
	</div>
		

        <div id='tab1'>
			<?php 
				$pieces = getPieces($_SESSION['domicile_id']);
			?>
			<ul>
				<?php
					foreach ($pieces as $piece) {
						echo "<li class='list-pieces'><a href='piece1.php?piece=".$piece[0]."'>".$piece[1]."<a>
						<form action='../controllers/piece.php' method='post'>
						<input type='hidden' value=".$piece[0]." name='piece' id='piece'/>
						<input type='hidden' value='piece_del' name='action' id='action'/>
						<button type='submit'>Supprimer</button>
						</form>
						</li>";
					}
				?>
			</ul>
			<input id='add_piece' type="button"  value='+' />
		</div>
		<script>
		var path = window.location.href; 
		var url = new URL(path);
		var dom_id = url.searchParams.get("dom");
		if (dom_id == null) {
			var tab1 = document.getElementById("tab1");
			tab1.style.display = "none";
		}
		</script>
		<div class="modal1" id="myModal">
			<div class="modal-content">
				<span class="close">&times;</span>
    			<h2>Ajouter une pièce</h2>
				<form method="post" action="../controllers/piece.php">
                        <input class="input" type="type" name="name" id="name" placeholder="Nom de la pièce" size="30" maxlength="40" required/>
						<input type='hidden' value='piece_add' name='action' id='action'/>
						<button id ="validation1" type="submit">Valider</button>
				</form>
			  </div>
			</div>


		<script>
		var modal1 = document.getElementById('myModal');
		var button = document.getElementById("add_piece");
		var span = document.getElementsByClassName("close")[0];
		button.onclick = function() {
   			modal1.style.display = "block";
		}
		span.onclick = function() {
    		modal1.style.display = "none";
		}		
		window.onclick = function(event) {
    		if (event.target == modal1) {
        		modal1.style.display = "none";
    		}
		}
		</script>

	</body>

</html>
