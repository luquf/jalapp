<?php

require __DIR__.'/../models/user.php';
require __DIR__.'/../models/releve_capteurs.php';
require __DIR__.'/../models/capteur.php';
require_once __DIR__.'/../lib/uuid.php';

// get data from sensor server and insert it in db


while (true) {

    $all_sensors = getAllCapteurs();
foreach($all_sensors as $sensor) {
    $heure = date("Y-m-d H:i:s");
    if ($sensor[3] == "ON") {
        switch ($sensor[2]) {
            case "HUM":
                $val = rand(10, 20);
                $uid = uuid::v4();
                setReleveCapteur($uid, sensor[0], $heure, $sensor[2], $val);
                break;
            case "TEMP":
                $val = rand(20, 35);
                $uid = uuid::v4();
                setReleveCapteur($uid, $sensor[0], $heure, $sensor[2], $val);
                break;
            case "FUM":
                $val = 0;
                $uid = uuid::v4();
                setReleveCapteur($uid, $sensor[0], $heure, $sensor[2], $val);
                break;       
        }
    }
}

$all_controleurs = getAllControleurs();
foreach($all_controleurs as $controleur) {
    $heure = date("Y-m-d H:i:s");
    switch ($controleur[2]) {
            case "LUM":
                $state = getControleurState($controleur[0])[0][0];
                $uid = uuid::v4();
                setReleveControleur($uid, $controleur[0], $heure, $controleur[2], $state);
                break; 
            case "CH":
                $state = getControleurState($controleur[0])[0][0];
                $uid = uuid::v4();
                setReleveControleur($uid, $controleur[0], $heure, $controleur[2], $state);
                break;
            case "VOL":
                $state = getControleurState($controleur[0])[0][0];
                $uid = uuid::v4();
                setReleveControleur($uid, $controleur[0], $heure, $controleur[2], $state);
                break;       
        }
    }


    sleep(10);
}
