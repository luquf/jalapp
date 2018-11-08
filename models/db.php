<?php

require __DIR__.'/../config.php';

function connectDB($host=DB_HOST, $name=DB_NAME, $user=DB_USER, $pass=DB_PASS) {
    try {
        $db = new PDO("mysql:host=$host;dbname=$name;charset=utf8", $user, $pass);
        return $db;
    } catch (Exception $e) {
        die("Error during DB conn: " . $e->getMessage());
    }
}