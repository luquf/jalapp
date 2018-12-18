<?php


require_once __DIR__.'/../models/capteur.php';

function getUsersCapteurAdmin($pieceid){
    return getCapteurs($pieceid);
}
?>