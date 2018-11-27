<?php

session_start();

require __DIR__.'/../models/user.php';

//require "mail.php";

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
        echo $mdp;
        // header('Location: ../views/inscription.php');
        //sendPassword($mdp, $email, $prenom, $nom);
     } else { //connexion
        $email = test_input($_POST["email1"]);
        $mot_de_passe = test_input($_POST["pass"]);
        $ok = checkCredentials($email, $mot_de_passe);
        if ($ok) { // credentials are validated
            $connected = $_SESSION['connected'];
            if (!isset($connected) || $connected == "false") {
                $_SESSION['connected'] = "true";
                $data = getUserByEmail($email);
                $_SESSION['user_id'] = $data[0]; 
            }
            header('Location: ../views/ajoutdomicile1.php');
        } else { // credentials are false
            $_SESSION['connected'] = "false";
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