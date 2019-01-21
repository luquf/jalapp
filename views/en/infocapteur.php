<?php

session_start();

if (!isset($_SESSION["connected"]) || $_SESSION["connected"] == "false") {
    header("Location: inscription.php");
    exit();
} else {
    if (isset($_SESSION["is_admin"]) && $_SESSION["is_admin"] == 1) {
        header("Location: admin_interface.php");
        exit();
    }
}

if (isset($_GET['capteur'])) {
    $_SESSION['capteur_id'] = $_GET['capteur'];
    $type = 1;
} else if (isset($_GET['controleur'])) {
    $_SESSION['controleur_id'] = $_GET['controleur'];
    $type = 2;
} else {
    header("Location: domicile.php");
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../public/css/piece1.css" />
		<link rel="icon" type="image/png" href="../public/assets/favicon.png" />
		<link rel="stylesheet" href="../public/assets/fontawesome-free-5.6.3-web/css/all.css" />
		<script src='../public/js/jquery-3.3.1.min.js'></script>
		<script src='../public/js/Chart.min.js'></script>
		<title>Domisep: Infos Capteur </title>

	</head>

	<body>
		<div id="bandeau">
			<div class="logo">

					<a href="domicile.php"> <img src="../public/assets/logo.png" alt = "Logo Domisep" id="logo" title = "Logo Domisep"  />

			</div>




				<div id="bandeau_droite">
                <div class="language">
                <a href= "aide_accueil_ENG.php" style = "text-decoration: none; color: #fff"	> <img src="../public/assets/usa.svg"> ENG </a>
						</div>

					<div class="aide">
						<a href= "aide_accueil.php" style = "text-decoration: none; color: #515659"	> Aide </a>
					</div>


					<div class="settings">
						<a href= "user_settings.php" style = "text-decoration: none; color: #515659">Réglages</a>
					</div>
					<div class="connexion">
						<a href="inscription.php" style = "text-decoration: none; color: #515659"> Déconnexion </a>
					</div>

				</div>

		</div>

		<div id="slogan">
			<h1>
			Informations
			</h1>
		</div>

		</div>
		<div id='tab1'>
			<?php echo "<a id='back-button' href='piece1.php?piece=" . $_SESSION['piece_id'] . "' style='text-decoration: none;color: #515659;'><i class='fa fa-arrow-circle-left fa-lg'></i> <b> Retour</b></a>"; ?>

		    <div class="sensor-left">

                        <?php
require_once __DIR__ . '/../controllers/capteur.php';
require_once __DIR__ . '/../models/piece.php';
$pieces = getPiecesByID($_SESSION['piece_id']);
$capteurs = getCapteursController($_SESSION['capteur_id']);
$controleurs = getControleursController($_SESSION['controleur_id']);
if ($type == 1) {
    if (count($capteurs) == 0) {
        header("Location: piece1.php?piece=" . $_SESSION['piece_id']);
    }
    foreach ($capteurs as $capteur) {
        $t = "";
        switch ($capteur[2]) {
            case "HUM":
                $t = "Capteur d'humidité";
                break;
            case "TEMP":
                $t = "Capteur de température";
                break;
            case "FUM":
                $t = "Capteur de fumée";
                break;
            default:
                break;
        }
        echo "
                        <div class='infos'>
                        <h1 class='titre'><i class='fa fa-microchip fa-sm'></i> Infos du capteur <em>'" . $capteur[1] . "'</em></h1>
                        <br/>
                            <span>Numéro de série : </span><b>" . $capteur[0] . "</b>
                            <br/><span>Type : </span><b>" . $t . "</b>
                            <br/><span>Emplacement : </span><b>" . $pieces[0][1] . "</b>
                        </div>

                        <div class ='historique'>
                            <h1 class='titre'><i class='fa fa-history fa-sm'></i> Historique du capteur <em>'" . $capteur[1] . "'</em></h1><br/>";
    }

    require __DIR__ . '/../controllers/releve.php';

    $releve_capteur = getCapteurDataByID($_SESSION['capteur_id']);
    ?>
  <canvas id="linechart1"></canvas>
<script>
    var ctx = $("#linechart1");
    var lineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [
                <?php
foreach ($releve_capteur as $k => $releve) {
        echo "'" . $releve[2] . "',";
        if ($k >= 12) {
            break;
        }
    }
    ?>
            ],
            datasets: [
                {
                    label: 'Relevé horaire',
                    data: [
                        <?php
foreach ($releve_capteur as $k => $releve) {
        echo $releve[4] . ",";
        if ($k >= 12) {
            break;
        }
    }
    ?>
                    ]
                }
            ]
        }
    })
</script>
<?php
} else {
    if (count($controleurs) == 0) {
        header("Location: piece1.php?piece=" . $_SESSION['piece_id']);
    }
    foreach ($controleurs as $controleurs) {
        $t = "";
        switch ($controleurs[2]) {
            case "LUM":
                $t = "Controleur de luminosité";
                break;
            case "VOL":
                $t = "Controleur de volet";
                break;
            case "CH":
                $t = "Controleur de chauffage";
                break;
            default:
                break;
        }
        echo "

                        <div class='infos'>
                        <h1 class='titre'><i class='fa fa-microchip fa-sm'></i> Infos du controleur <em>'" . $controleurs[1] . "'</em></h1>
                        <span>Numéro de série : </span><b>" . $controleurs[0] . "</b>
                        <br/><span>Type : </span><b>" . $t . "</b>
                        <br/><span>Emplacement : </span><b>" . $pieces[0][1] . "</b>
                        </div>

                        <div class ='historique'>
                            <h1 class='titre'><i class='fa fa-history fa-sm'></i> Historique du controleur <em>'" . $controleurs[1] . "'</em></h1>";
    }
    require __DIR__ . '/../controllers/releve.php';
    $releve_cont = getControleurDataByID($_SESSION['controleur_id']);
    ?>
<canvas id="linechart"></canvas>
<script>
    var ctx = $("#linechart");
    var lineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [
                <?php
foreach ($releve_cont as $k => $releve) {
        echo "'" . $releve[2] . "',";
        if ($k >= 12) {
            break;
        }
    }
    ?>
            ],
            datasets: [
                {
                    label: 'Relevé horaire',
                    data: [
                        <?php
foreach ($releve_cont as $k => $releve) {
        echo $releve[4] . ",";
        if ($k >= 12) {
            break;
        }
    }
    ?>
                    ]
                }
            ]
        }
    })
</script>
<?php
}
?>
</div>

                    </div>
                </div>
                </body>



</html>


