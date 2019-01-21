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