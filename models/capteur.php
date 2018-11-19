<?php

require 'db.php';

function getCapteurs($pieceid) {
    $db = connectDB();
    $stmt = $db->prepare("SELECT * from `capteur` WHERE id_piece=?");
    $stmt->execute(array($pieceid));
    $data = $stmt->fetchAll(PDO::FETCH_NUM);
    return $data;
}

function setCapteur($pieceid, $nom, $capteurid) {
    $db = connectDB();
    $stmt = $db->prepare("INSERT INTO `capteur` VALUES(':id_capteur, :nom, :id_piece')");
    $stmt->bindParam(':id_capteur', $capteurid);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':id_piece', $pieceid);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_NUM);
    return $data;
}

function removeCapteur($capteurid) {
    $db = connectDB();
    $stmt = $db->prepare("DELETE FROM `capteur` WHERE id_capteur=?");
    $stmt->execute(array($capteurid));
    $data = $stmt->fetchAll(PDO::FETCH_NUM);
    return $data;
}

?>