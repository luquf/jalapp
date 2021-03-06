<?php


session_start();

require_once __DIR__.'/../models/capteur.php';
require_once __DIR__.'/../lib/uuid.php';

$capteurs = array("hum", "temp", "fum");
$controleurs = array("lum", "vol", "ch");

$lang = $_SESSION['lang'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = testinput($_POST["name"]);
    $type = testinput($_POST["capteur"]);
    $reference = testinput($_POST["reference"]);
    $ref = testinput($_POST["ref"]);
    if (isset($reference) && !empty($reference)) {
        $capt = getCapteursByID($reference);
        $cont = getControllersByID($reference);
        if (count($capt) != 0 || count($cont) != 0) {
            header('Sensor-exists: true');
        } else {
            header('Sensor-exists: false');
        }
    } else if (isset($nom) && isset($type)) {
        if (in_array($type, $capteurs)) {
            switch ($type) {
                case "hum":
                    $capteur_id = $ref;
                    setCapteur($capteur_id, $nom, $type, "ON",$_SESSION['piece_id']);
                    ($lang == "fr") ? header("Location: ../views/piece1.php?piece=".$_SESSION['piece_id']) : header("Location: ../views/en/piece1.php?piece=".$_SESSION['piece_id']);
                    break;
                case "temp":
                    $capteur_id = $ref;
                    setCapteur($capteur_id, $nom, $type, "ON",$_SESSION['piece_id']);
                    ($lang == "fr") ? header("Location: ../views/piece1.php?piece=".$_SESSION['piece_id']) : header("Location: ../views/en/piece1.php?piece=".$_SESSION['piece_id']);
                    break;
                case "fum":
                    $capteur_id = $ref;
                    setCapteur($capteur_id, $nom, $type, "ON",$_SESSION['piece_id']);
                    ($lang == "fr") ? header("Location: ../views/piece1.php?piece=".$_SESSION['piece_id']) : header("Location: ../views/en/piece1.php?piece=".$_SESSION['piece_id']);
                    break;
            }
        } else {
            switch ($type) {
                case "lum":
                    $controleur_id = $ref;
                    setControleur($controleur_id, $nom, $type, 0,$_SESSION['piece_id']);
                    ($lang == "fr") ? header("Location: ../views/piece1.php?piece=".$_SESSION['piece_id']) : header("Location: ../views/en/piece1.php?piece=".$_SESSION['piece_id']);
                    break;
                case "vol":
                    $controleur_id = $ref;
                    setControleur($controleur_id, $nom, $type, 0,$_SESSION['piece_id']);
                    ($lang == "fr") ? header("Location: ../views/piece1.php?piece=".$_SESSION['piece_id']) : header("Location: ../views/en/piece1.php?piece=".$_SESSION['piece_id']);
                    break;
                case "ch":
                    $controleur_id = $ref;
                    setControleur($controleur_id, $nom, $type, 20,$_SESSION['piece_id']);
                    ($lang == "fr") ? header("Location: ../views/piece1.php?piece=".$_SESSION['piece_id']) : header("Location: ../views/en/piece1.php?piece=".$_SESSION['piece_id']);
                    break;
            }
        }
    }
}

function testinput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function getCapteursControllerPIECE($id) {
    return getCapteurs($id);
}

function getControleursControllerPIECE($id) {
    return getControleurs($id);
}

function getCapteursController($capteurid) {
    return getCapteursByID($capteurid);
}

function getControleursController($controleurid) {
    return getControllersByID($controleurid);
}
