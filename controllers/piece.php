<?php

session_start();

require __DIR__.'/../models/piece.php';
require_once __DIR__.'/../lib/uuid.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $nom = test_input($_POST["name"]);
    $piece_id = test_input($_POST['piece']);
    $action = test_input($_POST['action']);
    if ($action == "piece_add") { // ajout de la piece
        $id_domicile = $_SESSION['domicile_id'];
        $piece_id = UUID::v4();
        setPiece($id_domicile, $nom, $piece_id);
        header('Location: ../views/domicile.php?dom='.$_SESSION['domicile_id']);
    } else if ($action == "piece_del") { // suppresion de la piece
        removePiece($piece_id);
        header('Location: ../views/domicile.php?dom='.$_SESSION['domicile_id']);
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
