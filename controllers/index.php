<?php

$lang = $_SESSION['lang'];

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    ($lang == "fr") ? header("Location: ../views/inscription.php") : header("Location: ../views/en/inscription.php");
}