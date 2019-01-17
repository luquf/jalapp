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
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
		<title>Domisep : Contact</title>
	</head>

	<body>
		<div id="bandeau">
			<div class="logo">
				
					<a href="domicile.php"> <img src="../public/assets/logo.png" alt = "Logo Domisep" id = "logo" title = "Logo Domisep"/>
			</div>

            <div id="bandeau_droite">
            <div class="language">
							<a href= "contact_ENG.php" style = "text-decoration: none; color: #515659"	> ENG </a>
						</div>
            <div class="aide">
							<a href= "aide_accueil.php" style = "text-decoration: none; color: #515659"	> Aide </a>
						</div>
				
					<div class="settings">
						<a href="contact.php" style = "text-decoration: none; color: #515659"> Contact </a>
					</div>
                    <div class="connexion">
						<a href="inscription.php" style = "text-decoration: none; color: #515659"> Connexion </a>
					</div>
					
				</div>

        </div>

        <div id="slogan">
			<h1>
				Contactez-nous!
			</h1>
		</div>

        <div id="tableau" >
            <div class="modif_infos">
                <h2 class="titre">
                <i class="fa fa-edit fa-sm"></i> Formulaire
                </h2>
                            <span id="msg-sent" style="color:green;" hidden >Votre message bien été envoyé !</span>
                            <span id="msg-sending" style="color:orange;" hidden >En cours d'envoi...</span>
                            <span id="msg-error" style="color:red;" hidden >Veuillez vérifier vos informations !</span>
                            <input class="input" id="input-name" type="text" name="name" id="name" placeholder="Nom *" size="40" maxlength="100"required/>
                            <input class="input" id="input-surname" type="text" name="surname" id="surname" placeholder="Prénom *" size="40" maxlength="100" required/>
                            <input class="input" id="input-email" type="email" name="email" id="email" placeholder="Email *" size="40" maxlength="100" required/>
                            <textarea style="font-family:Arial;" id="input-msg" class="input" name="message" id="message" rows=7 placeholder="Message *" required></textarea>
                            <input class="input" id="send-button" type="Button" value="Envoyer"/>
                    <script>
                    $('#input-name').on('input', function() {
                        if (/^[a-zA-Z ]+$/.test($('#input-name').val()) && $('#input-name').val().length > 0) {
                            $('#input-name').css('border', '2px solid green');
                        } else {
                            $('#input-name').css('border', '2px solid red');
                        }
                    });
                    $('#input-surname').on('input', function() {
                        if (/^[a-zA-Z ]+$/.test($('#input-surname').val()) && $('#input-surname').val().length > 0) {
                            $('#input-surname').css('border', '2px solid green');
                        } else {
                            $('#input-surname').css('border', '2px solid red');
                        }
                    });
                    var re = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
                    $('#input-email').on('input', function() {
                        if (re.test($('#input-email').val()) && $('#input-email').val().length > 0) {
                            $('#input-email').css('border', '2px solid green');
                        } else {
                            $('#input-email').css('border', '2px solid red');
                        }
                    });
                    $('#input-msg').on('input', function() {
                        if ($('#input-msg').val().length > 10) {
                            $('#input-msg').css('border', '2px solid green');
                        } else {
                            $('#input-msg').css('border', '2px solid red');
                        }
                    });
                    $('#send-button').click(function() {
                        if (($('#input-msg').val().length > 10) &&
                        (re.test($('#input-email').val()) && $('#input-email').val().length > 0) &&
                        (/^[a-zA-Z ]+$/.test($('#input-surname').val()) && $('#input-surname').val().length > 0) &&
                        (/^[a-zA-Z ]+$/.test($('#input-name').val()) && $('#input-name').val().length > 0)) {
                            $('#msg-sending').show();
                            $('#msg-error').hide();
                            $('#msg-sent').hide();
                            $.post('../controllers/contact.php',
										{
										  name: $('#input-lastname').val(),
                                          surname: $('#input-surname').val(),
                                          email: $('#input-email').val(),
                                          msg: $('#input-msg').val()
										},
										function(data, status, req){
                                            $('#msg-sending').hide();
											$('#msg-sent').show();
                                            $('#msg-error').hide();
										});
                            // color and text reset
                            $('#input-name').css('border', '1px solid #515659').val('');
                            $('#input-surname').css('border', '1px solid #515659').val('');
                            $('#input-email').css('border', '1px solid #515659').val('');
                            $('#input-msg').css('border', '1px solid #515659').val('');
                        } else {
                            $('#msg-sending').hide();
                            $('#msg-sent').hide();
                            $('#msg-error').show();
                        }
                    })
                    </script>
            </div>


</div>

            </body>


            </html>
