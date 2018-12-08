<?php

session_start();

require __DIR__.'/../models/piece.php';
require __DIR__.'/../lib/uuid.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $nom = testinput($_POST["name"]);
    $id_domicile = $_SESSION['domicile_id'];
    $piece_id = UUID::v4();
    setPiece($id_domicile, $nom, $piece_id);
    header('Location: ../views/domicile.php?dom='.$_SESSION['domicile_id']);
}

function testinput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}