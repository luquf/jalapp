<?php

$name =$surname =$email = $password = $address = $ville = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
  $surname = test_input($_POST["surname"]);
  $email = test_input($_POST["email"]);
  $password = test_input($_POST["pass"]);
  $comment = test_input($_POST["address"]);
  $gender = test_input($_POST["ville"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>