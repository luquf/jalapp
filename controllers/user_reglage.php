<?php

require __DIR__."/../models/user.php";

$name = $surname = $email = $password = $address = $ville = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $prenom = test_input($_POST["name"]);
  $nom = test_input($_POST["surname"]);
  $email = test_input($_POST["email"]);
  $mdp = test_input($_POST["pass"]);
  $addresse = test_input($_POST["address"]);
  $genre = test_input($_POST["ville"]);

  if (isset($prenom)) {

  }

  if (isset($prenom)) {

  }

  if (isset($prenom)) {

  }

  if (isset($prenom)) {

  }

  if (isset($prenom)) {

  }

  if (isset($prenom)) {

  }

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


?>