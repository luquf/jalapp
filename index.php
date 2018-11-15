<?php
 
require __DIR__.'/controllers/authentification.php';


if(!isset($_COOKIE["conn_token"])) {
    $cookie_name = "conn_token";
    $cookie_value = "";
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    header('Location: views/accueil.php');
} else {
    if (!isset($_COOKIE['conn_token'])) { 
        header('Location: views/accueil.php');
    } else { // potentially connected
        $cipher_content = $_COOKIE['conn_token'];
        //$decipher_content = decryptToken($cipher_content, $secret_key);
        $ok = decryptToken($cipher_content, $secret_key);
        //echo gettype($decipher_content);
        if (!$ok) {
            header('Location: accueil.php');
        } else {
            header('Location: views/ajoutdomicile1.php'); 
        }       
    }
}
