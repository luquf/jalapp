<?php

require __DIR__."/../models/user.php";

session_start();

$name = $surname = $email = $password = $address = $ville = "";

$lang = $_SESSION['lang'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['action']) && $_POST['action'] == "del_account") {
    removeUserByID($_SESSION['user_id']);
    session_destroy();
    header();
  }
  $prenom = test_input($_POST["surname"]);
  $nom = test_input($_POST["name"]);
  $email = test_input($_POST["email"]);
  $ancien = test_input($_POST["old_pass"]);
  $nouveau = test_input($_POST["new_pass"]);
  $adresse = test_input($_POST["address"]);
  $ville = test_input($_POST["ville"]);

  $current_user = getUserByID($_SESSION['user_id']);
  $err = false;
  $user_id = $_SESSION['user_id'];
  
  if (isset($prenom) && trim($prenom) != "") {
    $ok = setPrenom($prenom, $user_id);
    if (!($ok == 1)) {
      $err = true;
    }
  }

  if (isset($nom) && trim($nom) != "") {
    $ok = setNom($nom, $user_id);
    if (!($ok == 1)) {
      $err = true;
    }
  }

  if (isset($ancien) && isset($nouveau) && trim($ancien) != ""  && trim($nouveau) != "") {
    $ok = setPassword($current_user[0][3], $ancien, $nouveau);
    if (!($ok == 1)) {
      $err = true;
    }
  }

  if (isset($email) && trim($email) != "") {
    $ok = setEmail($email, $user_id);
    if (!($ok == 1)) {
      $err = true;
    }
  }

  if (isset($adresse) && trim($adresse) != "") {
    $ok = setAdresse($adresse, $user_id);
    if (!($ok == 1)) {
      $err = true;
    }
  }

  if (isset($ville) && trim($ville) != "") {
    $ok = setVille($ville, $user_id);
    if (!($ok == 1)) {
      $err = true;
    }
  }

  if ($err == true) {
    ($lang == "fr") ? header("Location: ../views/user_settings.php?error=true") : header("Location: ../views/en/user_settings.php?error=true");
  } else {
    ($lang == "fr") ? header("Location: ../views/user_settings.php?error=false") : header("Location: ../views/en/user_settings.php?error=false");
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


?>