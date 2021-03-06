<?php
session_start();
$_SESSION['lang'] = "en";
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
        <link rel="stylesheet" href="../../public/css/user_settings.css" />
        <link rel="icon" type="image/png" href="../../public/assets/favicon.png" />
        <link rel="stylesheet" href="../../public/assets/fontawesome-free-5.6.3-web/css/all.css" />
        <script src='../../public/js/jquery-3.3.1.min.js'></script>
		<title>Domisep : Contact</title>
	</head>

	<body>
		<div id="bandeau">
			<div class="logo">

					<a href="domicile.php"> <img src="../../public/assets/logo.png" alt = "Logo Domisep" id = "logo" title = "Logo Domisep"/>
            </div>
            
            <?php
					session_start();
					$text = "";
					if ($_SESSION["connected"] == "true") {
						$text = "Logout";
					} else {
						$text = "Login";
					}
				?>

            <div id="bandeau_droite">
            <div class="language">
            <a href= "../contact.php"> <img src="../../public/assets/france.png" id="language"></a>
						</div>
            <div class="aide">
							<a href= "aide_accueil.php" style = "text-decoration: none; color: #515659"	> Help </a>
						</div>

					<div class="settings">
						<a href="contact.php" style = "text-decoration: none; color: #515659"> Contact </a>
					</div>
                    <div class="connexion">
						<a href="inscription.php" style = "text-decoration: none; color: #515659"> <?php echo $text; ?> </a>
					</div>

				</div>

        </div>

        <div id="slogan">
			<h1>
				Contact us!
			</h1>
		</div>

        <div id="tableau" >
            <div class="modif_infos">
                <h2 class="titre">
                <i class="fa fa-edit fa-sm"></i> Form
                </h2>
                            <span id="msg-sent" style="color:green;" hidden >Message sent !</span>
                            <span id="msg-sending" style="color:orange;" hidden >Message sending...</span>
                            <span id="msg-error" style="color:red;" hidden >Please check your information !</span>
                            <input class="input" id="input-name" type="text" name="name" id="name" placeholder="Last name *" size="40" maxlength="100"required/>
                            <input class="input" id="input-surname" type="text" name="surname" id="surname" placeholder="First name *" size="40" maxlength="100" required/>
                            <input class="input" id="input-email" type="email" name="email" id="email" placeholder="Email *" size="40" maxlength="100" required/>
                            <textarea style="font-family:Arial;" id="input-msg" class="input" name="message" id="message" rows=7 placeholder="Message *" required></textarea>
                            <input class="input" id="send-button" type="Button" value="Send"/>
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
                            $.post('../../controllers/contact.php',
										{
										  name: $('#input-name').val(),
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
