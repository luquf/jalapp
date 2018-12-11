<?php

require __DIR__.'/../models/user.php';
require __DIR__.'/../controllers/mail.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = test_input($_POST['email']);
    $exists = emailExistsInDatabase($email);
    if ($exists) {
        $new_pass = generatePassword(); 
        changePassword($email, $new_pass);
        $user_data = getUserByEmail($email);
        sendForgottenPassword($email, $user_data[0][1], $user_data[0][2], $new_pass);
        header("Location: ../views/password.php?error=ok");
    } else {
        header("Location: ../views/password.php?error=notfound");
    }

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

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}