<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
session_start();

require_once __DIR__.'/../models/capteur.php';
require_once __DIR__.'/../models/piece.php';
require_once __DIR__.'/../models/domicile.php';
require_once __DIR__.'/../lib/uuid.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $action = testinput($_POST['action']);
    $capteur = testinput($_POST["capteur"]);
    $piece = testinput($_POST['piece']);
    $domicile = testinput($_POST['domicile']);    

    if (isset($capteur) && isset($action)) {
        if ($action == "capt_info") {
            header("Location: ../views/admin_infocapteur.php?capteur=".$capteur);
        } else if ($action == "capt_delete") {
            removeCapteur($capteur);
        } else if ($action == "capt_change"){
            $state = getCapteurState($capteur);
            if ($state[0][0] == "ON") {
                setCapteurState($capteur, "OFF");
            } else {
                setCapteurState($capteur, "ON");
            }
        } else if ($action == "cont_info") {
            header("Location: ../views/admin_infocapteur.php?controleur=".$capteur);
        } else if ($action == "cont_delete") {
            removeControleur($capteur);
        } else if ($action == "cont_change") {
            $level = $_POST['cont-val'];
            setControleurState($capteur, $level);
        }
    }
    if (isset($piece) && isset($action)) {
        if ($action == "piece_del") {
            removePiece($piece);
            header("Location: ../views/capteurs_admin.php?selected=".$_SESSION['selected_user']);
        }
    }
    if (isset($domicile) && isset($action)) {
        if ($action == "domicile_del") {
            removeDomicileByID($domicile);
            header("Location: ../views/capteurs_admin.php?selected=".$_SESSION['selected_user']);
        }
    }

} else {
    header("Location: ../views/accueil.php");
}


function testinput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
