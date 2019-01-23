<?php

session_start();
require_once "db.php";

function getDomiciles($userid) {
    $db = connectDB();
    $stmt = $db->prepare("SELECT * from `domiciles` 
    RIGHT JOIN utilisateurs ON domiciles.cle_utilisateur = utilisateurs.cle
    WHERE cle_utilisateur=? ");
    $stmt->execute(array($userid));
    $data = $stmt->fetchAll(PDO::FETCH_NUM);
    return $data;
}

function getDomicileByID($dom_id) {
    $db = connectDB();
    $stmt = $db->prepare("SELECT *, utilisateurs.cle from `domiciles`
    RIGHT JOIN utilisateurs ON domiciles.cle_utilisateur = utilisateurs.cle
    WHERE id_domicile=?");
    $stmt->execute(array($dom_id));
    $data = $stmt->fetchAll(PDO::FETCH_NUM);
    return $data;
}

function setDomicile($nom, $id, $cle) {
    $db = connectDB();
    $stmt = $db->prepare("INSERT INTO `domiciles` VALUES (:id_domicile, :nom, :cle_utilisateur)");
    $stmt->bindParam(':id_domicile', $id);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':cle_utilisateur', $cle);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_NUM);
    return $data;
}

function removeDomicileByID($id) {
    $db = connectDB();
    $stmt = $db->prepare("DELETE FROM `domiciles` WHERE id_domicile=?");
    $stmt->execute(array($id));
    $data = $stmt->fetchAll(PDO::FETCH_NUM);
    return $data;
}

// function getPieces($id) {
//     $db = connectDB();
//     $stmt = $db->prepare("SELECT * FROM `pieces` WHERE id_domicile=?");
//     $stmt->execute(array($id));
//     $data = $stmt->fetchAll(PDO::FETCH_NUM);
//     return $data;
// }

?>