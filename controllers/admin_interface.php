<?php

session_start();

require_once __DIR__.'/../models/user.php';

$lang = $_SESSION['lang'];

function getUsersAdmin(){
    $users = getUsers();
    foreach ($users as $user) {
        if ($user[9] == 1) {
            unset($users[array_search($user, $users)]); // remove admin users from admin panel
        }
    }
    return $users;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $action = testinput($_POST['action']);
    $id = testinput($_POST['user']);
    if ($action == "del_user") { // suppression du user
        removeUserByID($id);
        ($lang == "fr") ? header('Location: ../views/admin_interface.php') : header('Location: ../views/en/admin_interface.php');
    }
}

function testinput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>