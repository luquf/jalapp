<?php

require_once __DIR__ . '/../controllers/admin_capteur.php';
require_once __DIR__ . '/../controllers/user.php';

session_start();

if (!isset($_SESSION["connected"]) || $_SESSION["connected"] == "false") {
    header("Location: inscription.php");
    return;
}

if (isset($_GET['selected']) && $_GET['selected'] != '') {
    $_SESSION['selected_user'] = testinput($_GET['selected']);
} else {
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
        <script src='../public/js/jquery-3.3.1.min.js'></script>

		<title>Domisep : Liste des capteurs</title>
	</head>

	<body>
		<div id="bandeau">
			<div class="logo">

					<a href="admin_interface.php"> <img src="../public/assets/logo.png" alt = "Logo Domisep" title = "Logo Domisep" id="logo"/>

			</div>

			<div class="bandeau-droite">

					<a href= "inscription.php" class= "deconnexion" >Déconnexion </a>

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
        echo "<tr><td>" . $utilisateur[0] . "</td>
                                <td>" . $utilisateur[1] . "</td>
                                <td>" . $utilisateur[2] . "</td>
                                <td>" . $utilisateur[3] . "</td>
                                <td>" . $utilisateur[8] . "</td></tr>";
    }
}
?>

                </thead>
            </table>
        </div>


    <div class="principal">

                    <?php
require_once __DIR__ . '/../controllers/admin_capteur.php';

$userid = $_SESSION['selected_user'];
$data = getUserData($userid);
if (count($data) == 0) {
    echo "<p><i class='fa fa-exclamation-triangle'></i> Pas de données</p>";
}
foreach ($data as $domcile) {
    echo "<h1>" . $domcile[1] . "<form action='../controllers/admin_action.php' method='post' onsubmit=\"return confirm('Voulez vous vraiment supprimer ce domicile ?');\">
                        <input type='hidden' value=" . $domcile[0] . " name='domicile' id='domicile'/>
                        <input type='hidden' value='domicile_del' name='action' id='action'/>
                        <button id='del-domicile-button' type='submit' value='del_home'><i class='fa fa-trash'></i></button>
                    </form> </h1>
                        ";
    foreach ($domcile["pieces"] as $piece) {
        echo "<h2>" . $piece[1] . "<form action='../controllers/admin_action.php' method='post' onsubmit=\"return confirm('Voulez vous vraiment supprimer ce domicile ?');\">
                            <input type='hidden' value=" . $piece[0] . " name='piece' id='piece'/>
                            <input type='hidden' value='piece_del' name='action' id='action'/>
                            <button id='del-piece-button' type='submit' value='del_piece'><i class='fa fa-trash'></i></button>
                        </form></h2>
                            ";
        echo "<ul class='sensors'>";
        foreach ($piece["capteurs"] as $capteur) {
        $t = "";
        switch ($capteur[2]) {
            case "HUM":
                $t = "Humidité";
                break;
            case "FUM":
                $t = "Fumée";
                break;
            case "TEMP":
                $t = "Température";
                break;
            default:
                break;
        }
            echo "<li class='liste' id='element-" . $capteur[0] . "'><span id='display-" . $capteur[0] . "'>Nom: " . $capteur[1] . "<br>Type: " . $t . "<br>Etat: " . $capteur[3] . "</span>
								<form method='post' action='../controllers/admin_action.php'>
								<input type='hidden' value=" . $capteur[0] . " name='capteur' id='capteur'/>
								<input type='hidden' value='capt_info' name='action' id='action'/>
								<button>Informations </button>
                                </form>
								<input type='hidden' value=" . $capteur[0] . " name='capteur' id='capteur'/>
								<input type='hidden' value='capt_delete' name='action' id='action'/>
                                <button type='submit' id='del-" . $capteur[0] . "'>Supprimer</button>
								<br><input type='hidden' value=" . $capteur[0] . " name='capteur' id='capteur'/>
								<input type='hidden' value='capt_change' name='action' id='action'/>
                                <button type='submit' id='change-" . $capteur[0] . "'>Changer</button>
								</li>
                                <script>
                                    $('#change-" . $capteur[0] . "').click(function() {
                                        $.post('../controllers/admin_action.php',
                                        {
                                          action: 'capt_change',
                                          capteur: '" . $capteur[0] . "'
                                        },
                                        function(data, status){
                                          if (status == 'success') {
                                              if ($('#display-" . $capteur[0] . "').text().includes('OFF')) {
                                                  $('#display-" . $capteur[0] . "').html('Nom: " . $capteur[1] . "<br>Type: " . $t . "<br>Etat: ON');
                                              } else {
                                                  $('#display-" . $capteur[0] . "').html('Nom: " . $capteur[1] . "<br>Type: " . $t . "<br>Etat: OFF');
                                              }
                                          }
                                        });
                                  });

                                  $('#del-" . $capteur[0] . "').click(function() {
                                      if (confirm('Etes-vous sûr de vouloir supprimer ce capteur ?')) {
                                        $.post('../controllers/admin_action.php',
                                        {
                                        action: 'capt_delete',
                                        capteur: '" . $capteur[0] . "'
                                        },
                                        function(data, status){
                                        if (status == 'success') {
                                            $('#element-" . $capteur[0] . "').remove();
                                        }
                                        });
                                    }
                              });
                                </script>
                                ";
        }
        echo "</ul>";
        echo "<ul class='sensors'>";
        foreach ($piece["controleurs"] as $controleur) {
            $type = $controleur[2];
		$t = "";
        switch ($type) {
            case "LUM":
                $t = "Luminosité";
                break;
            case "VOL":
                $t = "Volet électrique";
                break;
            case "CH":
                $t = "Chauffage";
                break;
            default:
                break;
        }
		if ($type == "CH") {
			echo "<li class=liste id='element-" . $controleur[0] . "'><span id='display-" . $controleur[0] . "'>Nom: " . $controleur[1] . "<br>Type: " . $t . "<br>Valeur: " . $controleur[3] . " °C</span>
									</br></br><form method='post' action='../controllers/admin_action.php'>
									<input type='hidden' value=" . $controleur[0] . " name='capteur' id='capteur'/>
									<input type='hidden' value='cont_info' name='action' id='action'/>
									<button type='submit'>Informations</button>
									</form>
									<input type='hidden' value=" . $controleur[0] . " name='capteur' id='capteur'/>
									<input type='hidden' value='cont_delete' name='action' id='action'/>
									<button type='button' id='del-" . $controleur[0] . "'>Supprimer</button><br>
									<input type='hidden' value=" . $controleur[0] . " name='capteur' id='capteur'/>
									<input type='hidden' value='cont_change' name='action' id='action'/>
									<input type='range' class='cont-val' id='change-" . $controleur[0] . "' name='cont-val' min='10' max='30' step='1' value=" . $controleur[3] . ">
									</li>
									<script>
									$('#change-" . $controleur[0] . "').change(function() {
										  $.post('../controllers/admin_action.php',
										  {
											action: 'cont_change',
											capteur: '" . $controleur[0] . "',
											'cont-val': $(this).val()
										  },
										  function(data, status){
											if (status == 'success') {
												$('#display-" . $controleur[0] . "').html('Nom: " . $controleur[1] . "<br>Type: " . $t . "<br>Valeur: '+$('#change-" . $controleur[0] . "').val()+' °C');
											}
										  });
									});

									$('#del-" . $controleur[0] . "').click(function() {
										if (confirm('Etes-vous sûr de vouloir supprimer ce controleur ?')) {
											$.post('../controllers/admin_action.php',
											{
											action: 'cont_delete',
											capteur: '" . $controleur[0] . "',
											},
											function(data, status){
											if (status == 'success') {
												$('#element-" . $controleur[0] . "').remove();
											}
											});
										}
								  });

								</script>";
		} else {
			echo "<li class=liste id='element-" . $controleur[0] . "'><span id='display-" . $controleur[0] . "'>Nom: " . $controleur[1] . "<br>Type: " . $t . "<br>Valeur: " . $controleur[3] . " %</span>
									</br></br><form method='post' action='../controllers/admin_action.php'>
									<input type='hidden' value=" . $controleur[0] . " name='capteur' id='capteur'/>
									<input type='hidden' value='cont_info' name='action' id='action'/>
									<button type='submit'>Informations</button>
									</form>
									<input type='hidden' value=" . $controleur[0] . " name='capteur' id='capteur'/>
									<input type='hidden' value='cont_delete' name='action' id='action'/>
									<button type='button' id='del-" . $controleur[0] . "'>Supprimer</button><br>
									<input type='hidden' value=" . $controleur[0] . " name='capteur' id='capteur'/>
									<input type='hidden' value='cont_change' name='action' id='action'/>
									<input type='range' class='cont-val' id='change-" . $controleur[0] . "' name='cont-val' min='0' max='100' step='5' value=" . $controleur[3] . ">
									</li>
									<script>
									$('#change-" . $controleur[0] . "').change(function() {
										  $.post('../controllers/admin_action.php',
										  {
											action: 'cont_change',
											capteur: '" . $controleur[0] . "',
											'cont-val': $(this).val()
										  },
										  function(data, status){
											if (status == 'success') {
												$('#display-" . $controleur[0] . "').html('Nom: " . $controleur[1] . "<br>Type: " . $t . "<br>Valeur: '+$('#change-" . $controleur[0] . "').val()+' %');
											}
										  });
									});

									$('#del-" . $controleur[0] . "').click(function() {
										if (confirm('Etes-vous sûr de vouloir supprimer ce controleur ?')) {
											$.post('../controllers/admin_action.php',
											{
											action: 'cont_delete',
											capteur: '" . $controleur[0] . "',
											},
											function(data, status){
											if (status == 'success') {
												$('#element-" . $controleur[0] . "').remove();
											}
											});
										}
								  });

								</script>";
		}

        }
        echo "</ul>";
    }
}

?>

    </div>
    </body>
</html>
