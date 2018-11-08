<?php
$nom = $prenom = $email = $adresse = $pays = $ville = $telephone = $cle_client = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $nom = test_input($_POST["nom"]);
    $prenom = test_input($_POST["prénom"]);
    $email = test_input($_POST["email"]);
    $adresse = test_input($_POST["adresse"]);
    $pays = test_input($_POST["pays"]);
    $ville = test_input($_POST["ville"]);
    $telephone = test_input($_POST["tel"]);
    $cle_client = test_input($_POST["cle"]);
}
function test_input($data) 
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
}
?>