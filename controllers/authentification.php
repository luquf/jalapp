<?php

session_start();
unset($_SESSION['connected']);

require __DIR__.'/../models/user.php';
require __DIR__.'/../models/domicile.php';

//require "mail.php";

$secret_key = "SecretSecret123@";

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
        if ($domiciles) {
            header('Location: ../views/domicile.php');
        } else {
            header('Location: ../views/ajoutdomicile1.php');
        }
    } else { // credentials are false
        $_SESSION['connected'] = "false";
        // header('Location: ../views/accueil.php');
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