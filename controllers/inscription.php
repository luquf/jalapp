<?php

session_start();

require __DIR__.'/../models/user.php';

$nom = $prenom = $email = $adresse = $pays = $ville = $telephone = $cle_client = ""; 
$secret_key = "SecretSecret123@";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

?>