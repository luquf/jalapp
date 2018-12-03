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
        <link rel="stylesheet" href="../public/css/user_settings.css" />
		<title>Domisep : Accueil</title>
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
					<a href= "accueil.php" style="color: #fff; text-decoration: underline;">Déconnexion </a>
				</p>
			</div>
        </div>

        <div id="tableau" >
            <div class="infos">
                <h2>
                    Informations
                </h2>
</br>
                        <p>
                            Nom : Demuijnck
                        </p>
                        <p>
                            Prénom : Arthur
                        </p>

                        <p>
                            email : arthurdemuijnck@gmail.com
                        </p>
                        <p>
                            Mot de Passe : supersuper
                        </p>
                        <p>
                            Adresse : 56 rue Sympa
                        </p>
                        <p>
                            Ville : Maubeuge
                        </p>

                </div>
            <div class="modif_infos">
                <h2>
                    Modifier les informations

                </h2>
                </br>
                <form method="post" action="../controllers/user_reglage.php">

                        <p>
                            <input type="name" name="name" id="name" placeholder="Nom" size="30" maxlength="20"/>
                        </p>
                        <p>
                            <input type="surname" name="surname" id="surname" placeholder="Prénom" size="30" maxlength="20"/>
                        </p>
                        <p>
                            <input type="email" name="email" id="email" placeholder="Email" size="30" maxlength="30" />
                        </p>
                        <p>
                            <input type="password" name="old_pass" id="old_pass" placeholder="Ancien mot de passe" size="30" maxlength="20" />
                        </p>
                        <p>
                            <input type="password" name="new_pass" id="new_pass" placeholder="Nouveau mot de passe" size="30" maxlength="20" />
                        </p>
                        <p>
                            <input type="address" name="address" id="address" placeholder="Adresse" size="30" maxlength="20"/>
                        </p>
                        <p>
                            <input type="ville" name="ville" id="ville" placeholder="Ville" size="30" maxlength="20"/>
                        </p>
                        <input type="submit" value="Valider"/>

            </div>
</div>

            </body>
            </html>
