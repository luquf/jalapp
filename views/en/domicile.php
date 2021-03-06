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

require_once __DIR__ . '/../../models/domicile.php';
require_once __DIR__ . '/../../models/piece.php';

$dom = getDomiciles($_SESSION['user_id']);
if (!isset($dom[0][0])) {
    header('Location: ajoutdomicile1.php');
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../../public/css/domicile.css" />
		<link rel="icon" type="image/png" href="../../public/assets/favicon.png" />
        <script src='../../public/js/jquery-3.3.1.min.js'></script>
		<link rel="stylesheet" href="../../public/assets/fontawesome-free-5.6.3-web/css/all.css" />
  		<title>Domisep: Residence(s) </title>

	</head>

	<body>
		<div id="bandeau">
				<div class="logo">
					<a href="domicile.php"> <img id="logo" src="../../public/assets/logo.png" alt = "Domisep's logo" title = "Domisep's Logo" />
				</div>



				<div id="bandeau_droite">
				<div class="language">
				<a href= "../domicile.php" > <img src="../../public/assets/france.png" id="language"> </a>
						</div>
					<div class="aide">
						<a href= "aide_accueil.php" style = "text-decoration: none; color: #515659"	> Help </a>
					</div>
					<div class="settings">
						<a href= "user_settings.php" style = "text-decoration: none; color: #515659">Settings</a>
					</div>
					<div class="connexion">
						<a href="inscription.php" style = "text-decoration: none; color: #515659"> Logout </a>
					</div>



				</div>





		</div>
	<div>
		<ul class='tabs'>
		<?php
require_once __DIR__ . '/../../controllers/domicile.php';
if (isset($_GET['dom']) && $_GET['dom'] != "") {
    $domicile = getDomicileByID(htmlspecialchars($_GET['dom']));
    if (count($domicile) == 0) {
        header("Location: domicile.php");
    } else if ($domicile[0][13] != $_SESSION['user_id']) {
		header("Location: domicile.php");
	}
    $_SESSION['domicile_id'] = testinput($_GET['dom']);
}
$domiciles = getDomicilesController($_SESSION['user_id']);
foreach ($domiciles as $val) {
    echo "<li><a href='domicile.php?dom=" . str_replace(' ', '', $val[0]) . "
				' id=" . str_replace(' ', '', $val[0]) . "><i class='fa fa-home' ></i> " . $val[1] . "";?>
				<form id='del-dom-form' method='post' action='../../controllers/domicile.php' onsubmit="return confirm
				('Do you really want to delete this residence ?')">
				<?php echo "
						<input type='hidden' value=" . $val[0] . " name='domicile' id='domicile'/>
						<input type='hidden' value='domicile_del' name='action' id='action'/>
						<button id='del-domicile-button' class='trash-button' type='submit' value='del_home'><i class='fa fa-trash trash-icon'></i></button>
						</form>
				</a></li>";
}
?>

            <li class="button-add"><button id='button' type="button">+</button></li>
        </ul>
        <div class="modal2" id="myModal2">
			<div class="modal-content2">
				<span class="close2">&times;</span>
    			<h2>Add a new residence</h2>
				<form method="post" action="../../controllers/domicile.php">
                        <input class="input" type="type" name="name" id="name" placeholder="Name of the residence" size="20" maxlength="40" required/>
                        <input type='hidden' value='domicile_add' name='action' id='action'/>
						<button id ="validation2" type="submit" value="ajouter">Add</button>
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
$domicile = getDomicileByID($_SESSION['domicile_id']);
echo "<h1 style='text-align:center;'>" . $domicile[0][1] . "</h1>";
?>

			<ul class="pieces-ul-top" style="list-style-type:none;">
				<?php
if (count($pieces) == 0) {
    echo "<li><i class='fa fa-exclamation-triangle'></i> You don't have any room for now.</li>";
} else {
    foreach ($pieces as $piece) {
        echo "<li class='list-pieces'><a href='piece1.php?piece=" . $piece[0] . "'>" . $piece[1] . "<a>";?>
		<form method='post' action='../../controllers/piece.php' onsubmit="return confirm
		('Do you really want to delete this room ?')">
		<?php echo "
			<input type='hidden' value=" . $piece[0] . " name='piece' id='piece'/>
			<input type='hidden' value='piece_del' name='action' id='action'/>
			<button type='submit' id='del-piece-button'>Delete</button>
			</form>
			</li>";
    }
}
?>
			</ul>
			<button id='add_piece'><i class='fa fa-plus'></i></button>
			<!-- <input id='add_piece' type="button"  value='+' /> -->
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
    			<h2>Add a new room</h2>
				<form method="post" action="../../controllers/piece.php">
                        <input class="input" type="type" name="name" id="name" placeholder="Name of the room" size="20" maxlength="20" required/>
						<input type='hidden' value='piece_add' name='action' id='action'/>
						<button id ="validation1" type="submit">Add</button>
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
