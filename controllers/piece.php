<?php

session_start();

require __DIR__.'/../models/piece.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $nom = testinput($_POST["name"]);
    $id_domicile = $_SESSION['id_domicile'];
    $piece_id = $v4uuid = UUID::v4();
    setPiece($id_domicile, $nom, $piece_id);
    header('Location: ../views/piece.php');
}

function testinput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}