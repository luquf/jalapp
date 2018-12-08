<?php

session_start();

// if(!isset($_SESSION["connected"]) || $_SESSION["connected"] == "false") {
//     header("Location: views/inscription.php");
// }

// require_once __DIR__.'/../models/domicile.php';

// $dom = getDomiciles($_SESSION['user_id']);
// if (!isset($dom[0][0])) {
//     header('Location: ../views/ajoutdomicile1.php');
// }

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
  		<title>Domisep: Domicile </title>

	</head>

	<body>
		<div id="bandeau">
				<div class="logo">
					<a href="accueil.php"> <img id="logo" src="../public/assets/logo.png" alt = "Logo Domisep" title = "Logo Domisep" />
				</div>

				<div id="bandeau_droite">
						<div class="aide">
							<a href= "aide_accueil.php"> Aide </a>
						</div>
					<div class="deconnexion">
						<a href="inscription.php"> Déconnexion </a>
					</div>
			</div>


		</div>


		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script>
			$(document).ready(function(){
				$('ul.tabs').each(function(){
					var $active, $content, $links = $(this).find('a');
					$active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
					$active.addClass('active');

					$content = $($active[0].hash);

					$links.not($active).each(function () {
						$(this.hash).hide();
					});

					$(this).on('click', 'a', function(e){
						$active.removeClass('active');
						$content.hide();

						$active = $(this);
						$content = $(this.hash);

						$active.addClass('active');
						$content.show();

						e.preventDefault();
					});

				});
			});
        </script>

	<div>
		<ul class='tabs'>
		<?php
			// require_once __DIR__ . '/../controllers/domicile.php';
			// $domiciles = getDomicilesController($_SESSION['user_id']);
			// foreach ($domiciles as $val) {
			// 	echo "<li><a href='#" . str_replace(' ', '', $val[1]) . "'>" . $val[1] . "</a></li>";
			// }
		?>

            <li class="button-add"><input class='button' type="button"  value='+' onclick="openModal()"/></li>
        </ul>

<div class="modal1" id="myModal">
			<div class="modal-content">
				<span class="close">&times;</span>
    			<h2>Ajouter une pièce</h2>
				<form method="post" action="../controllers/piece.php">
                        <input type="type" name="name" id="name" placeholder="Nom de la pièce : " size="30" maxlength="20"/>
						<button id ="validation1" type="submit">Valider</button>
			  </div>
			</div>
        <div id = "modal">
  			 <h1> Ajout Domicile</h1>
			   <div class="infos">
				<form method="post" action="../controllers/domicile.php">
                        <p>
                            <input type="type" name="name" id="name" placeholder="Type de domicile : " size="30" maxlength="20"/>
                        </p>

        	</div>

			<button id ="close" onclick ="closeModal()">X</button>
			<button id ="validation" onclick="addonglet()" >Valider</button>
		</div>
	</div>
		

    	<script src="app.js" type="text/javascript"></script>
        <script>
			$(document).ready(function() {
    			$("div#tabs").tabs();

    			$("button#validation").click(function() {

        			var num_tabs = $("div#tabs ul li").length + 1;

        			$("div#tabs ul").append(
            			"<li><a href='#tab" + num_tabs + " class="onglet"'>Domicile " + num_tabs + "</a></li>"
        			);
			$("div#tabs").append(
            	"<div id='tab" + num_tabs + "'>Domicile " + num_tabs + "</div>"
        	);
        	$("div#tabs").tabs("refresh");
    			});
			});

</script>

        <div id='tab1'>
			<h3> Liste des pièces </h3>
			<input id='add_piece' type="button"  value='+' />
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
