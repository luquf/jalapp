<?php

session_start();

require_once __DIR__.'/../models/capteur.php';
require_once __DIR__.'/../lib/uuid.php';

$lang = $_SESSION['lang'];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $action = testinput($_POST['action']);
    $capteur = testinput($_POST['capteur']);
    if (isset($capteur) & isset($action)) {
        if ($action == "capt_info") {
            ($lang == "fr") ? header("Location: ../views/infocapteur.php?capteur=".$capteur) : header("Location: ../views/en/infocapteur.php?capteur=".$capteur);
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
            ($lang == "fr") ? header("Location: ../views/infocapteur.php?controleur=".$capteur) : header("Location: ../views/en/infocapteur.php?controleur=".$capteur);
        } else if ($action == "cont_delete") {
            removeControleur($capteur);
        } else if ($action == "cont_change") {
            $level = testinput($_POST['cont-val']);
            setControleurState($capteur, $level);
        }
    } 
}


function testinput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
