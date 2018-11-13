<?php

require __DIR__.'/../models/user.php';

require __DIR__.'/../vendor/lcobucci/jwt/src/Builder.php';
require __DIR__.'/../vendor/lcobucci/jwt/src/Parser.php';

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
        echo $mdp;
         // send mail with password
        $utililsateur = array($cle_client, $nom, $prenom, $email, $mdp, $adresse, $ville, $pays, $telephone, false);
        setUser($utililsateur);
     } else { //connexion
        $email = test_input($_POST["email1"]);
        $mot_de_passe = test_input($_POST["pass"]);
        $ok = checkCredentials($email, $mot_de_passe);
        if ($ok) { // credentials are validated
            $cookie_name = "conn_token";
            $token = generateJWT($email, $mot_de_passe);
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
 
function generateJWT($uid, $email, $password) {
    $token = (new Builder())->setIssuer('http://lcoalhost') // Configures the issuer (iss claim)
                        ->setAudience('http://localhost') // Configures the audience (aud claim)
                        ->setId('secretkey', true) // Configures the id (jti claim), replicating as a header item
                        ->setIssuedAt(time()) // Configures the time that the token was issue (iat claim)
                        ->setNotBefore(time() + 60) // Configures the time that the token can be used (nbf claim)
                        ->setExpiration(time() + 3600) // Configures the expiration time of the token (exp claim)
                        ->set('uid', 1) // Configures a new claim, called "uid"
                        ->getToken(); // Retrieves the generated token
    echo $token;
    return $token;
}
 
function decryptToken($tok) {
    $token = (new Parser())->parse((string) $tok);
    $token->getHeaders();
    $token->getClaims(); 
    $data = array($token->getHeader('email', $token->getHeader('password')));
    return $data;
} 