<?php


// if(!isset($_SESSION["connected"]) || $_SESSION["connected"] == "false") {
//     header("Location: views/inscription.php");
// }

require_once __DIR__.'/../controllers/admin_capteur.php';
require_once __DIR__.'/../controllers/user.php';


session_start();
if (isset($_GET['selected']) && $_GET['selected'] != '') {
    $_SESSION['selected_user'] = testinput($_GET['selected']);
}
else {
    header('Location: admin_interface.php');
} 


?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
        <link rel="stylesheet" href="../public/css/capteurs_admin.css" />
        <link rel="icon" type="image/png" href="../public/assets/favicon.png" />
		<title>Domisep : Liste des capteurs</title>
	</head>

	<body>
		<div id="bandeau">
			<div class="logo">
			
					<a href="domicile.php"> <img src="../public/assets/logo.png" alt = "Logo Domisep" title = "Logo Domisep" id="logo"/>
				
			</div>

			<div class="bandeau-droite">
			
            
                    <a href="admin_reglages.php" class = "preferences" >Préférences</a>
					<a href= "inscription.php" class= "deconnexion">Déconnexion </a>
		
			</div>
        </div>

         <a href= "admin_interface.php" class = "retour" style ="text-decoration: none"><img src ="../public/assets/left_arrow.png" alt = "Logo Domisep" title = "Logo Domisep" id="retour"/></a>



        <div id="tableau" >

            <table class="identification">
            <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                    </tr>
                </thead>


                <tbody id="table">
                <thead>
                <?php
                        $userid = $_SESSION['selected_user'];
                        $utilisateur = getUserByID($userid);
                        if (count($utilisateur) == 0) {
							header('Location: admin_interface.php'); // if selected user id is invalid
						} else {
							foreach ($utilisateur as $utilisateur) {
                                echo "<tr><td>".$utilisateur[0]."</td>
                                <td>".$utilisateur[1]."</td>
                                <td>".$utilisateur[2]."</td>
                                <td>".$utilisateur[3]."</td>
                                <td>".$utilisateur[8]."</td></tr>";
                            }
                         }
                ?>
             
                </thead>
            </table>
        </div>


    <div class="principal">

                    <?php
                    require_once __DIR__.'/../controllers/admin_capteur.php';

                    $userid = $_SESSION['selected_user'];
                    $data = getUserData($userid);
                    foreach ($data as $domcile) {
                        echo "<h1>".$domcile[1]."</h1>";
                        foreach ($domcile["pieces"] as $piece) {
                            echo "<h2>".$piece[1]."</h2>";
                            foreach ($piece["capteurs"] as $capteur) {
                                echo "<p>".$capteur[1]." ".$capteur[2]." ".$capteur[3]."</p>
                                <div class = 'capteuradmin'> 
                                <form method='post' action='../controllers/admin_action.php'>
								<input type='hidden' value=".$capteur[0]." name='capteur' id='capteur'/>
								<input type='hidden' value='capt_info' name='action' id='action'/>
								<input id='informations' type='button' value = 'informations'/>
								</form>
								<form method='post' action='../controllers/admin_action.php'>
								<input type='hidden' value=".$capteur[0]." name='capteur' id='capteur'/>
								<input type='hidden' value='capt_delete' name='action' id='action'/>
								<button type='submit'>supprimer</button>
								</form>
								<form method='post' action='../controllers/admin_action.php'>
								<input type='hidden' value=".$capteur[0]." name='capteur' id='capteur'/>
								<input type='hidden' value='capt_change' name='action' id='action'/>
								<button type='submit'>changer</button>
								</form>
									</div>";
                            }
                            foreach ($piece["controleurs"] as $controleur) {
                                echo "<p>".$controleur[1]." ".$controleur[2]." ".$controleur[3]."</p>
                                <div class = 'capteuradmin'> 
                                <form method='post' action='../controllers/admin_action.php'>
								<input type='hidden' value=".$controleur[0]." name='capteur' id='capteur'/>
								<input type='hidden' value='cont_info' name='action' id='action'/>
								<input id='informations' type='button' value = 'informations'/>
								</form>
								<form method='post' action='../controllers/admin_action.php'>
								<input type='hidden' value=".$controleur[0]." name='capteur' id='capteur'/>
								<input type='hidden' value='cont_delete' name='action' id='action'/>
								<button type='submit'>supprimer</button>
								</form>
								<form method='post' action='../controllers/admin_action.php'>
								<input type='hidden' value=".$controleur[0]." name='capteur' id='capteur'/>
								<input type='hidden' value='cont_change' name='action' id='action'/>
									<input type='range' id='cont-val' name='cont-val'min='0' max='100' step='5' value=".$controleur[3].">
								<button type='submit'>changer</button>
								</form>
									</div>";
                            }
                        }
                    }
                    ?>

    </div>
    </body>
</html>