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
        <link rel="stylesheet" href="../public/css/admin_relgages.css" />
		<title>Domisep : Accueil</title>
	</head>

	<body>
		<div id="bandeau">
			<div class="logo">
		
					<a href="accueil.php"> <img src="../public/assets/logo.png" id ="logo" alt = "Logo Domisep" title = "Logo Domisep"  />
			
			</div>
			<div class="bandeau-droite">
			
					<a href= "accueil.php" class = "deconnexion">Déconnexion </a>
			
			</div>
        </div>

        <div id="tableau" >
            <div id="reglages">
            <h1>
                Réglages
            </h1>
            <p>
			    <a href= "admin_interface.php" style="color: #fff; text-decoration: underline;">Retour </a>
                </p>
                <form method="post" action="../controllers/admin_reglage.php">
                        <p>
                            <input type="email" name="email" id="email" placeholder="Modifier l'adresse email" size="30" maxlength="20" />
                            <input type="submit" value="Valider"/>
                        </p>
                        <p></p>
                            <input type="password" name="pass" id="pass" placeholder="Modifier le Mot de Passe" size="30" maxlength="20" />
                            <input type="submit" value="Valider"/>
                        </p>
                        <p>
                            <input type="add_admin" name="add_admin" id="add_admin" placeholder="Ajouter un administrateur" size="30" maxlength="20"/>
                            <input type="submit" value="Valider"/>
                        </p>
                </div>

            </body>
            </html>
