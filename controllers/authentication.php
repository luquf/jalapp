<?php

require __DIR__.'/../models/user.php';

use Lcobucci\JWT\Builder;

$nom = $prenom = $email = $adresse = $pays = $ville = $telephone = $cle_client = ""; //inscription
$email = $mot_de_passe = ""; // connexion


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['cle'])) { // inscription
        $nom = test_input($_POST["nom"]);
        $prenom = test_input($_POST["prénom"]);
        $email = test_input($_POST["email"]);
        $adresse = test_input($_POST["adresse"]);
        $pays = test_input($_POST["pays"]);
        $ville = test_input($_POST["ville"]);
        $telephone = test_input($_POST["tel"]);
        $cle_client = test_input($_POST["cle"]);

        $mdp = generatePassword();
        // send mail with password
        $utililsateur = array($cle_client, $nom, $prenom, $email, $mdp, $adresse, $ville, $pays, $telephone, false);
        setUser($utililsateur);

    } else { //connexion
        $email = test_input($_POST["email"]);
        $mot_de_passe = test_input($_POST["pass"]);
        $ok = checkCredentials($email, $mot_de_passe);
        if ($ok) { // credentials are validated
            $cookie_name = "conn_token";
            $token = generateJWT($email, $mot_de_passe);
            $cookie_value = $token;
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
            header('Location: views/ajoutdomicile1.php');
        } else { // credentials are false
            // set empty cookie
            $cookie_name = "conn_token";
            $cookie_value = "";
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
            header('Location: views/accueil.php');
        }
   }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


function generatePassword($length = 8) {
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $count = mb_strlen($chars);

    for ($i = 0, $result = ''; $i < $length; $i++) {
        $index = rand(0, $count - 1);
        $result .= mb_substr($chars, $index, 1);
    }

    return $result;
}

function generateJWT($uid, $email, $password) {
    $token = (new Builder())->set('uid', $uid)->set('email', $email)->set('password', $password)->getToken();
    echo $token;
    return $token;
}

function decryptToken() {
    $token = (new Parser())->parse((string) $token);
    $token->getHeaders();
    $token->getClaims(); 
    $data = array($token->getHeader('email', $token->getHeader('password')));
    return $data;
}