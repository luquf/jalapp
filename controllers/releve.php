<?php

require_once __DIR__.'/../models/releve_capteurs.php';

function getDataCapteur() {
    return getAllReleveCapteurs();
}

function getDataControleur() {
    return getAllReleveControleurs();
}

// function testinput($data) {
//     $data = trim($data);
//     $data = stripslashes($data);
//     $data = htmlspecialchars($data);
//     return $data;
// }

?>
