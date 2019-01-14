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
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

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
                        echo "<h1>".$domcile[1]."<form action='../controllers/admin_action.php' method='post'>
                        <input type='hidden' value=".$domcile[0]." name='domicile' id='domicile'/>
                        <input type='hidden' value='domicile_del' name='action' id='action'/>
                        <button id='del-domicile-button' type='submit' value='del_home'><i class='fa fa-trash'></i></button>
                    </form> </h1>
                        ";
                        foreach ($domcile["pieces"] as $piece) {
                            echo "<h2>".$piece[1]."<form action='../controllers/admin_action.php' method='post'>
                            <input type='hidden' value=".$piece[0]." name='piece' id='piece'/>
                            <input type='hidden' value='piece_del' name='action' id='action'/>
                            <button id='del-piece-button' type='submit' value='del_piece'><i class='fa fa-trash'></i></button>
                        </form></h2>
                            ";
                            foreach ($piece["capteurs"] as $capteur) {
                                echo "<p>".$capteur[1]." ".$capteur[2]." ".$capteur[3]."<div class = 'capteuradmin'> 
                                <form method='post' action='../controllers/admin_action.php'>
								<input type='hidden' value=".$capteur[0]." name='capteur' id='capteur'/>
                                <input type='hidden' value='capt_info' name='action' id='action'/>
                                <button <a href='admin_infocapteur.php?cont=".$capteur[0]."'>informations<a> </button>
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
									</div></p>
                                ";
                            }
                            foreach ($piece["controleurs"] as $controleur) {
                                echo "<p>".$controleur[1]." ".$controleur[2]." ".$controleur[3]."</p>
                                <div class = 'capteuradmin'> 
                                <form method='post' action='../controllers/admin_action.php'>
								<input type='hidden' value=".$controleur[0]." name='capteur' id='capteur'/>
								<input type='hidden' value='cont_info' name='action' id='action'/>
                                <button <a href='admin_infocapteur.php?cont=".$controleur[0]."'>informations<a> </button>
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

    <footer>

<div class = 'info_footer'> 
    <div>Powered by 
<a href = "jala.php"> <img id="logo_JALA" src="../public/assets/logo_JALA.png" alt = "Logo JALA" title = "Logo JALA"/></a>
  ©</div>
  <a href= 'mentionslegales.php'> Mentions Légales </a> 
  <a href= 'cgu.php'> ConditionsGénérales </a> 


</div>


</footer>

</html>