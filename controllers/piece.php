<?php

session_start();

require __DIR__.'/../models/piece.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $nom = testinput($_POST["name"]);
    $piece_id = testinput($_POST['piece']);
    $action = testinput($_POST['action']);
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
