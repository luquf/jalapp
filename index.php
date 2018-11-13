<?php
 
require __DIR__."/models/user.php";
use Lcobucci\JWT\Builder;
if(!isset($_COOKIE["conn_token"])) {
    // set empty cookie
    $cookie_name = "conn_token";
    $cookie_value = "";
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    header('Location: views/accueil.php');
} else {
    if ($_COOKIE['conn_token' == '']) { // cookie empty
        header('Location: views/accueil.php');
    } else { // potentially connected
        // decrypt the token to check
        header('Location: views/ajoutdomicile1.php'); 
    }
}
