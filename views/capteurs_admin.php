<?php

//session_start();

// if(!isset($_SESSION["connected"]) || $_SESSION["connected"] == "false") {
//     header("Location: views/inscription.php");
// }

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
                <?php
						require_once __DIR__.'/../controllers/admin_interface.php';
                        $userid = $_SESSION['selected_user'];
						if (count($utilisateur) == 0) {
							echo "<li><i class='fa fa-exclamation-triangle'></i> Vous n'avez pas encore de client sur votre site.</li>";
						} else {
							foreach ($utilisateur as $utilisateur) {
                                echo "<tr><td>".$utilisateur[0]."</td>
                                <td><a href= 'capteurs_admin.php?selected=".$utilisateur[0]."' class='lien_ID'>".$utilisateur[1]."</a></td>
                                <td><a href= 'capteurs_admin.php?selected=".$utilisateur[0]."' class='lien_ID'>".$utilisateur[2]."</a></td>
                                <td><a href= 'capteurs_admin.php' class='lien_ID'>".$utilisateur[3]."</a></td>
                                <td><a href= 'capteurs_admin.php' class='lien_ID'>".$utilisateur[8]."</a></td></tr>";
                            }
                         }
                                ?>
             
                </thead>
            </table>
        </div>


    <div class="principal">

        <div>


                    <script type="text/javascript">
                    /* Voici la fonction javascript qui change la propriété "display"
                    pour afficher ou non le div selon que ce soit "none" ou "block". */

                    function AfficherMasquerPieces()
                    {
                    divInfo = document.getElementById('pieces');

                    if (divInfo.style.display == 'none')
                    divInfo.style.display = 'block';
                    else
                    divInfo.style.display = 'none';

                    }
                    </script>


                    <?php
                    require_once __DIR__.'/../controllers/admin_UsersDomiciles.php';
                    $domicile = getUsersDomicileAdmin($userid);
                    if (count($domicile) == 0) {
                    echo "<li><i class='fa fa-exclamation-triangle'></i> Vous n'avez pas encore de domicile.</li>";
                    } else {
                     foreach ($domicile as $domicile) {
                      echo "<li>".$domicile[1]."</li>";
                      }
                    }
                    ?>

        </div>



        <div id="pieces" style="display:none;">



                             <script type="text/javascript">
                                /* Voici la fonction javascript qui change la propriété "display"
                                pour afficher ou non le div selon que ce soit "none" ou "block". */

                                function AfficherMasquerCapteurs()
                                {
                                divInfo = document.getElementById('capteurs');

                                if (divInfo.style.display == 'none')
                                divInfo.style.display = 'block';
                                else
                                divInfo.style.display = 'none';

                                }
                            </script>



                                <?php
                                require_once __DIR__.'/../controllers/admin_UsersPieces.php';
                                $piece = getUsersPieceAdmin($domicileid);
                                if (count($piece) == 0) {
                                    echo "<li><i class='fa fa-exclamation-triangle'></i> Vous n'avez pas encore de piece.</li>";
                                } else {
                                    foreach ($piece as $piece) {
                                echo "<li>".$piece[1]."</li>";
                                    }
                                }
                                ?>


        </div>
    </div>


        <div id="capteurs" style="display:none;">

            <table>
                <tbody id="table">

                    <script type="text/javascript">
                        function deleteRow(r)
                            {
                                var i = r.parentNode.parentNode.rowIndex;
                                document.getElementById("table").deleteRow(i);
                            }
                    </script>
                    
                    <?php
						require_once __DIR__.'/../controllers/admin_UsersCapteurs.php';
						$capteur = getUsersCapteurAdmin($pieceid);
						if (count($capteur) == 0) {
							echo "<li><i class='fa fa-exclamation-triangle'></i> Vous n'avez pas encore de capteur.</li>";
						} else {
							foreach ($capteur as $capteur) {
                                echo "<tr><td>".$capteur[1]."</td>
                                <td>".$capteur[2]."</td>
                                <td>".$capteur[4]."</td>
                                <td>".$capteur[3]."</td>
                                <td><input class ='button' type='button' value='Changer l'état'></td></tr>
                                <td><input class ='button' type='button' value='X' onclick='deleteRow(this);'></td></tr>";
                            }
                         }
                    ?>
                    
                </tbody>
            </table>
        </div>
    </body>
</html>