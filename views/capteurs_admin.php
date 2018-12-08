<?php

session_start();

// if(!isset($_SESSION["connected"]) || $_SESSION["connected"] == "false") {
//     header("Location: views/inscription.php");
// }

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

         <a href= "admin_interface.php" class = "retour" style ="text-decoration: none"> retour liste utilisateur </a>



        <div id="tableau" >

            <table class="identification">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Téléphone</th>
                    <th>Email</th>
                    <th>Dernière connexion</th>
                </tr>
                </thead>
            </table>
        </div>

            <br>
            <br>


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



                    <input class="domiciles" type="button" value="Domicile 1" onClick="AfficherMasquerPieces()"/>

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


                <input class="pieces" type="button" value="Pièce 1" onClick="AfficherMasquerCapteurs()" />
                <br>
                <input class="pieces" type="button" value="Pièce 2" onClick="AfficherMasquerCapteurs()" />
                <br>
                <input class="pieces" type="button" value="Pièce 3" onClick="AfficherMasquerCapteurs()" />


        </div>
    </div>

        <br>
        <br>


        <div id="capteurs" style="display:none;">

            <table>
                <tbody>

                    <tr>
                        <td>Capteur 1</td>
                        <td>emplacement</td>
                        <td>état</td>
                        <td>éteindre</td>
                        <td>allumer</td>
                        <td><input class ="button" type="button" value="X" onclick="deleteRow(this);"></td>
                    </tr>

                    <tr>
                        <td>Capteur 2</td>
                        <td>emplacement</td>
                        <td>état</td>
                        <td>éteindre</td>
                        <td>allumer</td>
                        <td><input class ="button" type="button" value="X" onclick="deleteRow(this);"></td>
                    </tr>

                    <tr>
                        <td>Capteur 3</td>
                        <td>emplacement</td>
                        <td>état</td>
                        <td>éteindre</td>
                        <td>allumer</td>
                        <td><input class ="button" type="button" value="X" onclick="deleteRow(this);"></td>
                    </tr>
                </tbody>
            </table>
        </div>
