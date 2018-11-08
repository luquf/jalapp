<?php


function connectDB($host="localhost", $name="jala", $user="luquf", $pass="lolipop") {
    try {
        $db = new PDO("mysql:host=$host;dbname=$name;charset=utf8", $user, $pass);
        return $db;
    } catch (Exception $e) {
        die("Error during DB conn: " . $e->getMessage());
    }
}