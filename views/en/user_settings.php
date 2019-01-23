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

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
        <link rel="stylesheet" href="../../public/css/user_settings.css" />
        <link rel="icon" type="image/png" href="../../public/assets/favicon.png" />
        <link rel="stylesheet" href="../../public/assets/fontawesome-free-5.6.3-web/css/all.css" />
        <script src='../../public/js/jquery-3.3.1.min.js'></script>
		<title>Domisep : Settings</title>
	</head>

	<body>
		<div id="bandeau">
			<div class="logo">

					<a href="domicile.php"> <img src="../../public/assets/logo.png" alt = "Logo Domisep" id = "logo" title = "Logo Domisep"/>
			</div>



                <div id="bandeau_droite">
                <div class="language">
                <a href= "../user_settings.php"> <img src="../../public/assets/france.png" id="language"></a>
						</div>

						<div class="aide">
							<a href= "aide_accueil.php" style = "text-decoration: none; color: #515659"	> Help </a>
						</div>


					<div class="settings">
						<a href= "user_settings.php" style = "text-decoration: none; color: #515659"> Settings </a>
                    </div>
                    <div class="connexion">
                    <a href= "inscription.php"  style = "text-decoration: none; color: #515659"> Logout </a>
                    </div>

				</div>
        </div>

        <div id="slogan">
			<h1>
            Settings
			</h1>
		</div>

        <div id="tableau" >
            <div class="infos">
                <h2 class="titre">
                    <i class="fa fa-info-circle fa-sm"></i> Information
                </h2>
                <?php
require __DIR__ . '/../../models/user.php';
$user = getUserByID($_SESSION['user_id']);
?>
                        <p>
                            <b>Last Name: </b><?php echo $user[0][1] ?>
                        </p>
                        <p>
                        <b>First Name: </b> <?php echo $user[0][2] ?>
                        </p>

                        <p>
                        <b>Email: </b> <?php echo $user[0][3] ?>
                        </p>
                        <p>
                        <b>Password: </b> ********
                        </p>
                        <p>
                        <b>Address: </b> <?php echo $user[0][5] ?>
                        </p>
                        <p>
                        <b>City: </b><?php echo $user[0][6] ?>
                        </p>
                        <h2 class="titre">
                            <i class="fa fa-trash fa-sm"></i> Account
                        </h2>
                        <button class='input' id="del-button">Delete my account</button>
                        <script>
                            $('#del-button').click(function () {
                                if (confirm("Do you wish to delete your account ?")) {
                                    $.post('../../controllers/user_reglage.php',
                                    		{
                                    		  action: 'del_account'
                                    		},
                                    		function(data, status, req){
                                                window.location.href = "/views/en/inscription.php";
                                            }
                                    );
                                }
                        })
                        </script>
                </div>
            <div class="modif_infos">
                <h2 class="titre">
                <i class="fa fa-edit fa-sm"></i> Edit

                </h2>

                <?php
$error = $_GET['error'];
if (isset($error)) {
    if ($error == "true") {
        echo "<p style='color:red;'>An error occured.</p>";
    } else {
        echo "<p style='color:green;'Your data has been saved.</p>";
    }
}
?>

                <form method="post" action="../../controllers/user_reglage.php">
                            <input class="input" type="text" name="name" id="name" placeholder="Last Name" size="30" maxlength="40"/>
                            <input class="input" type="text" name="surname" id="surname" placeholder="First Name" size="30" maxlength="40"/>
                            <input class="input" type="email" name="email" id="email" placeholder="Email" size="30" maxlength="40" />
                            <input class="input" type="password" name="old_pass" id="old_pass" placeholder="Old password" size="30" maxlength="40" />
                            <input class="input" type="password" name="new_pass" id="new_pass" placeholder="New password" size="30" maxlength="40" />
                            <input class="input" type="text" name="address" id="address" placeholder="Address" size="30" maxlength="40"/>
                            <input class="input" type="text" name="ville" id="ville" placeholder="City" size="30" maxlength="40"/>
                            <input class="input" type="submit" value="Save"/>
                </form>
            </div>
</div>

            </body>



            </html>
