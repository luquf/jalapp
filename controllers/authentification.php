<?php

require __DIR__.'/../models/user.php';

require __DIR__."/../vendor/autoload.php";

require "mail.php";

$secret_key = "SecretSecret123@";

$nom = $prenom = $email = $adresse = $pays = $ville = $telephone = $cle_client = ""; //inscription
$email = $mot_de_passe = ""; // connexion

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['cle'] != '') { // inscription
        $nom = test_input($_POST["nom"]);
        $prenom = test_input($_POST["prénom"]);
        $email = test_input($_POST["email2"]);
        $adresse = test_input($_POST["adresse"]);
        $pays = test_input($_POST["pays"]);
        $ville = test_input($_POST["ville"]);
        $telephone = test_input($_POST["tel"]);
        $cle_client = test_input($_POST["cle"]);
        $mdp = generatePassword();        
        $utilisateur = array($cle_client, $nom, $prenom, $email, $mdp, $adresse, $ville, $pays, $telephone, false);
        setUser($utilisateur);
        sendPassword($mdp, $email);
     } else { //connexion
        $email = test_input($_POST["email1"]);
        $mot_de_passe = test_input($_POST["pass"]);
        $ok = checkCredentials($email, $mot_de_passe);
        if ($ok) { // credentials are validated
            $cookie_name = "conn_token";
            $token = generateJWT($email, $mot_de_passe, $secret_key);
            $cookie_value = $token;
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
            header('Location: ../views/ajoutdomicile1.php');
        } else { // credentials are false
            // set empty cookie
            $cookie_name = "conn_token";
            $cookie_value = "";
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
            header('Location: ../views/accueil.php');
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
 
function generateJWT($email, $password, $secret) {
    $builder = new ReallySimpleJWT\TokenBuilder();
    $token = $builder->addPayload(['key' => 'email', 'value' => $email])
        ->addPayload(['key' => 'password', 'value' => $password])
        ->setSecret($secret)
        ->setExpiration(time() + 3600)
        ->setIssuer("http://localhost")
        ->build();
    return $token;
}
 
function decryptToken($token, $secret) {
    /*$validator = new ReallySimpleJWT\TokenValidator;
    $validator->splitToken($tok)
        ->validateExpiration()
        ->validateSignature($secret);
    $payload = $validator->getPayload();
    $header = $validator->getHeader();
    return $payload; */
    try {
        $result = ReallySimpleJWT\Token::validate($token, $secret);
        return true;
    } catch (Exception $e) {
        return false;
    }
    return false;
}

