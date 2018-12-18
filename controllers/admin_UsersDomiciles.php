<?php


require_once __DIR__.'/../models/domicile.php';

function getUsersDomicileAdmin($userid){
    return getDomiciles($userid);
}
?>