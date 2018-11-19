<?php


function connectDB($host="localhost", $name="jala", $user="root", $pass="") {
    try {
        $db = new PDO("mysql:host=$host;dbname=$name;charset=utf8", $user, $pass);
        return $db;
    } catch (Exception $e) {
        die("Error during DB conn: " . $e->getMessage());
    }
}

?>