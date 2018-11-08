<?php
$email = $mot_de_passe = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $email = test_input($_POST["email"]);
    $mot_de_passe = test_input($_POST["pass"]);
}
function test_input($data) 
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>