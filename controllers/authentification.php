<?php

session_start();
unset($_SESSION['connected']);

require __DIR__.'/../models/user.php';
require __DIR__.'/../models/domicile.php';

//require "mail.php";

$secret_key = "SecretSecret123@";

$lang = $_SESSION['lang'];

$email = $mot_de_passe = ""; // connexion

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = test_input($_POST["email1"]);
    $mot_de_passe = test_input($_POST["pass"]);
    $ok = checkCredentials($email, $mot_de_passe);
    if ($ok) { // credentials are validated
        $_SESSION['connected'] = "true"; 
        $data = getUserByEmail($email);
        $_SESSION['user_id'] = $data[0][0];
        $domiciles = hasDomiciles();
        if ($data[0][9] == 1) {
            $_SESSION['is_admin'] = 1;
            header('Location: ../views/admin_interface.php');
        } else {
            $_SESSION['is_admin'] = 0;
            if ($domiciles) {
                ($lang == "fr") ? header('Location: ../views/domicile.php') : header('Location: ../views/en/domicile.php');
            } else {
                ($lang == "fr") ? header('Location: ../views/ajoutdomicile1.php') : header('Location: ../views/en/ajoutdomicile1.php');
            }
        }
    } else { // credentials are false
        $_SESSION['connected'] = "false";
        ($lang == "fr") ? header('Location: ../views/inscription.php?error=credentials') : header('Location: ../views/en/inscription.php?error=credentials');
    }
}
 
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


function hasDomiciles() {
    $dom = getDomiciles($_SESSION['user_id']);
    if (!isset($dom[0][0])) {
        return false;
    }
    return true;
}


function isAuthenticated() {
    if(!isset($_SESSION["connected"]) || $_SESSION["connected"] == "false") {
        return true;
    } else {
        return false;
    }
}

function logout() {
    return session_destroy();
}