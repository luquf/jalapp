<?php

session_start();

require_once __DIR__.'/../models/user.php';

function getUsersAdmin(){
    return getUsers();
}
