<?php

require_once __DIR__."/../models/user.php";

function getUserByIDController($id) {
    return getUserByID($id);
}