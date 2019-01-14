<?php

session_start();

require_once __DIR__.'/../models/domicile.php';
require __DIR__.'/../lib/uuid.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $nom = testinput($_POST["name"]);
    $action = testinput($_POST['action']);
    if ($action == "domicile_del") {
        $dom_id = testinput($_POST['domicile']);
        removeDomicileByID($dom_id);
        header('Location: ../views/domicile.php?dom='.$_SESSION['user_id']);
    } else if ($action == 'domicile_add') {
            $nom = testinput($_POST["name"]);
            $user_id = $_SESSION['user_id'];
            $dom_id = UUID::v4();
            setDomicile($nom, $dom_id, $user_id);
            header('Location: ../views/domicile.php?dom='.$dom_id);
    }
}



function getDomicilesController($id) {
    return getDomiciles($id);
}

function testinput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
