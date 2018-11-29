<?php

require __DIR__.'/../models/domicile.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = test_input($_POST["name"]);
    $user_id = $_SESSION['user_id'];
    $dom_id = $v4uuid = UUID::v4();
    setDomicile($nom, $dom_id, $cle);
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}



?>