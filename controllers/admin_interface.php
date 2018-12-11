<?php

session_start();

require_once __DIR__.'/../models/user.php';
require __DIR__.'/../lib/uuid.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = testinput($_POST["name"]);
    $user_id = $_SESSION['user_id'];
    $dom_id = UUID::v4();
    setUser($nom, $dom_id, $user_id);
    header('Location: ../views/admin_interface.php?dom='.$dom_id);
}