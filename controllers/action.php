<?php

session_start();

require_once __DIR__.'/../models/capteur.php';
require __DIR__.'/../lib/uuid.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // process post request
}