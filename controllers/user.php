<?php

require_once __DIR__."/../models/user.php";

$lang = $_SESSION['lang'];

function getUserByIDController($id) {
    return getUserByID($id);
}