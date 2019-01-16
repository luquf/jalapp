<?php

require_once __DIR__.'/mail.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = testinput($_POST["name"]);
    $surname = testinput($_POST["surname"]);
    $email = testinput($_POST["email"]);
    $msg = testinput($_POST["msg"]);
    if (isset($email) && isset($surname) && isset($name) && isset($msg)) {
        sendContactFormMail($email, $name, $surname, $msg);
        header(200);
    }
    header(200);
}


function testinput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}