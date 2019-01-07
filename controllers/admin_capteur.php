<?php

require_once __DIR__."/../models/user.php";
require_once __DIR__."/../models/domicile.php";
require_once __DIR__."/../models/piece.php";
require_once __DIR__."/../models/capteur.php";


function getUserData($user_id) {
    $data = array();
    $domiciles = getDomiciles($user_id);
    foreach ($domiciles as $dom) {
        $dom["pieces"] = array(); 
        $pieces = getPieces($dom[0]);
        foreach ($pieces as $piece) {
            $piece["capteurs"] = array(); 
            $piece["controleurs"] = array(); 
            $capteurs = getCapteurs($piece[0]);
            foreach ($capteurs as $capteur) {
                array_push($piece["capteurs"], $capteur);
            }
            $controllers = getControleurs($piece[0]);
            foreach ($controllers as $controller) {
                array_push($piece["controleurs"], $controller);
            }
            array_push($dom["pieces"], $piece);
        }
        array_push($data, $dom);
        // var_dump($data);
    }
    return $data;
}

// getUserData("klsjhgeuhkufjgegrk");

require_once __DIR__.'/../models/capteur.php';
require __DIR__.'/../lib/uuid.php';

$capteurs = array("hum", "temp", "fum");
$controleurs = array("lum", "vol", "ch");


if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $nom = testinput($_POST["action"]);
    $type = testinput($_POST["capteur"]);
    if (isset($nom) && isset($type)) {
        if (in_array($type, $capteurs)) {
            switch ($type) {
                case "hum":
                    $capteur_id = UUID::v4();
                    setCapteur($capteur_id, $nom, $type, "ON",$_SESSION['piece_id']);
                    header("Location: ../views/capteurs_admin.php?selected=".$_SESSION['userid']);
                    break;
                case "temp":
                    $capteur_id = UUID::v4();
                    setCapteur($capteur_id, $nom, $type, "ON",$_SESSION['piece_id']);
                    header("Location: ../views/capteurs_admin.php?selected=".$_SESSION['userid']);
                    break;
                case "fum":
                    $capteur_id = UUID::v4();
                    setCapteur($capteur_id, $nom, $type, "ON",$_SESSION['piece_id']);
                    header("Location: ../views/capteurs_admin.php?selected=".$_SESSION['userid']);
                    break;
            }
        } else {
            switch ($type) {
                case "lum":
                    $controleur_id = UUID::v4();
                    setControleur($controleur_id, $nom, $type, "ON",$_SESSION['piece_id']);
                    header("Location: ../views/capteurs_admin.php?selected=".$_SESSION['userid']);
                    break;
                case "vol":
                    $controleur_id = UUID::v4();
                    setControleur($controleur_id, $nom, $type, "ON",$_SESSION['piece_id']);
                    header("Location: ../views/capteurs_admin.php?selected=".$_SESSION['userid']);
                    break;
                case "ch":
                    $controleur_id = UUID::v4();
                    setControleur($controleur_id, $nom, $type, "ON",$_SESSION['piece_id']);
                    header("Location: ../views/capteurs_admin.php?selected=".$_SESSION['userid']);
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

function getCapteursController($id) {
    return getCapteurs($id);
}

function getControleursController($id) {
    return getControleurs($id);
}