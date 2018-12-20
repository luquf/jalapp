<?php


// if(!isset($_SESSION["connected"]) || $_SESSION["connected"] == "false") {
//     header("Location: views/inscription.php");
// }

require_once __DIR__.'/../controllers/admin_capteur.php';
require_once __DIR__.'/../controllers/user.php';


session_start();
if (isset($_GET['selected']) && $_GET['selected'] != '') {
    $_SESSION['selected_user'] = $_GET['selected'];
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
					<a href= "accueil.php" class= "deconnexion">Déconnexion </a>
		
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
							echo "<li><i class='fa fa-exclamation-triangle'></i> Vous n'avez pas encore de client sur votre site.</li>";
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
                    $userid = $_SESSION['selected_user'];
                    $data = getUserData($userid);
                    foreach ($data as $domcile) {
                        echo "<h1>".$domcile[1]."</h1>";
                        foreach ($domcile["pieces"] as $piece) {
                            echo "<h2>".$piece[1]."</h2>";
                            foreach ($piece["capteurs"] as $capteur) {
                                echo "<p>".$capteur[1]." ".$capteur[2]." ".$capteur[3]."</p>";
                            }
                            foreach ($piece["controleurs"] as $controleur) {
                                echo "<li>--------".$controleur[1]."</li>";
                            }
                        }
                    }
                    ?>

    </div>
    </body>
</html>