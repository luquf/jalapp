<?php

session_start();

require_once __DIR__.'/../models/user.php';

function getUsersAdmin(){
    return getUsers();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $action = testinput($_POST['action']);
    $id = testinput($_POST['user']);
    if ($action == "del_user") { // suppression du user
        removeUserByID($id);
        header('Location: ../views/admin_interface.php');
    }
}

function testinput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>