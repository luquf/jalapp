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
		<title>Domisep : Liste des capteurs</title>
	</head>

	<body>
		<div id="bandeau">
			<div class="logo">
				<p>
					<a href="accueil.php"> <img src="../public/assets/logo.png" alt = "Logo Domisep" title = "Logo Domisep" style="width: 150px; height: auto;" /> 
				</p>
			</div>

			<div class="deconnexion">
				<p>
                </br>	
                    <a href="admin_reglages.php" style="color : #fff; text-decoration : underline;">Préférences</a>			
					<a href= "accueil.php" style="color: #fff; text-decoration: underline;">Déconnexion </a> 
				</p>
			</div>
        </div>
         <td><a href= "admin_interface.php" style="color: #fff; text-decoration: underline;">retour liste utilisateur </a></td>

        
                
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
