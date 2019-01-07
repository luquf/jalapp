<?php

session_start();

require_once __DIR__.'/../models/capteur.php';
require __DIR__.'/../lib/uuid.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $action = testinput($_POST['action']);
    $capteur = testinput($_POST['capteur']);
    if (isset($capteur) & isset($action)) {
        if ($action == "capt_info") {
            header("Location: ../views/capteurs_admin.php?selected=".$_SESSION['selected_user']);
        } else if ($action == "capt_delete") {
            removeCapteur($capteur);
            header("Location: ../views/capteurs_admin.php?selected=".$_SESSION['selected_user']);
        } else if ($action == "capt_change"){
            $state = getCapteurState($capteur);
            if ($state[0][0] == "ON") {
                setCapteurState($capteur, "OFF");
            } else {
                setCapteurState($capteur, "ON");
            }
            header("Location: ../views/capteurs_admin.php?selected=".$_SESSION['selected_user']);
        } if ($action == "cont_info") {
            header("Location: ../views/capteurs_admin.php?selected=".$_SESSION['selected_user']);
        } if ($action == "cont_delete") {
            removeControleur($capteur);
            header("Location: ../views/capteurs_admin.php?selected=".$_SESSION['selected_user']);
        } if ($action == "cont_change") {
            $level = $_POST['cont-val'];
            setControleurState($capteur, $level);
            header("Location: ../views/capteurs_admin.php?selected=".$_SESSION['selected_user']);
        }
    }
}


function testinput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}