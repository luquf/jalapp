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
        <link rel="icon" type="image/png" href="../public/assets/favicon.png" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
		<title>Domisep : Réglages</title>
	</head>

	<body>
		<div id="bandeau">
			<div class="logo">
				
					<a href="admin_interface.php"> <img src="../public/assets/logo.png" alt = "Logo Domisep" id = "logo" title = "Logo Domisep"/>
			</div>

			<div class="bandeau-droite">
				<a href= "inscription.php" class= "deconnexion"> Déconnexion </a>
			</div>
        </div>

        <div id="slogan">
			<h1>
				Réglages
			</h1>
		</div>

        <div id="tableau" >
            <div class="infos">
                <h2 class="titre">
                    <i class="fa fa-info-circle fa-sm"></i> Informations
                </h2>
                <?php
                require __DIR__.'/../models/user.php';
                $user = getUserByID($_SESSION['user_id']);
                ?>
                        <p>
                            <b>Nom: </b><?php echo $user[0][1]?>
                        </p>
                        <p>
                        <b>Prénom: </b> <?php echo $user[0][2]?>
                        </p>

                        <p>
                        <b>Email: </b> <?php echo $user[0][3]?>
                        </p>
                        <p>
                        <b>Mot de passe: </b> ********
                        </p>
                        <p>
                        <b>Adresse: </b> <?php echo $user[0][5]?>
                        </p>
                        <p>
                        <b>Ville: </b><?php echo $user[0][6]?>
                        </p>

                </div>
            <div class="modif_infos">
                <h2 class="titre">
                <i class="fa fa-edit fa-sm"></i> Modifier

                </h2>
                <?php
                $error = $_GET['error'];
                if (isset($error)) {
                    if ($error == "true") {
                        echo "<p style='color:red;'>Une erreur s'est produite.</p>";
                    } else {
                        echo "<p style='color:green;'>Vos modifications ont été enregistrées.</p>";
                    }
                }
                ?>
                <form method="post" action="../controllers/admin_reglage.php">
                            <input class="input" type="text" name="name" id="name" placeholder="Nom" size="30" maxlength="40"/>
                            <input class="input" type="text" name="surname" id="surname" placeholder="Prénom" size="30" maxlength="40"/>
                            <input class="input" type="email" name="email" id="email" placeholder="Email" size="30" maxlength="40" />
                            <input class="input" type="password" name="old_pass" id="old_pass" placeholder="Ancien mot de passe" size="30" maxlength="40" />
                            <input class="input" type="password" name="new_pass" id="new_pass" placeholder="Nouveau mot de passe" size="30" maxlength="40" />
                            <input class="input" type="text" name="address" id="address" placeholder="Adresse" size="30" maxlength="40"/>
                            <input class="input" type="text" name="ville" id="ville" placeholder="Ville" size="30" maxlength="40"/>
                            <input class="input" type="submit" value="Valider"/>
                </form>
            </div>
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
