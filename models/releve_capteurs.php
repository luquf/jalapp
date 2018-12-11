<?php

require_once "db.php";

function getAllReleveCapteurs() {
    $db = connectDB();
    $stmt = $db->prepare("SELECT * from `releve_capteurs`");
    $data = $stmt->fetchAll(PDO::FETCH_NUM);
    return $data;
}

function setReleveCapteur($id_capteur, $heure, $type, $donnee) {
    $db = connectDB();
    $stmt = $db->prepare("INSERT INTO `releve_capteurs` VALUES (:id_capteur, :heure, :typ, :donnee)");
    $stmt->bindParam(':id_capteur', $id_capteur);
    $stmt->bindParam(':heure', $heure);
    $stmt->bindParam(':typ', $type);
    $stmt->bindParam(':donnee', $donnee);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_NUM);
    return $data;
}

function getAllReleveControleurs() {
    $db = connectDB();
    $stmt = $db->prepare("SELECT * from `releve_controleurs`");
    $data = $stmt->fetchAll(PDO::FETCH_NUM);
    return $data;
}

function setReleveControleur($id_capteur, $heure, $type, $donnee) {
    $db = connectDB();
    $stmt = $db->prepare("INSERT INTO `releve_controleurs` VALUES (:id_capteur, :heure, :typ, :donnee)");
    $stmt->bindParam(':id_capteur', $id_capteur);
    $stmt->bindParam(':heure', $heure);
    $stmt->bindParam(':typ', $type);
    $stmt->bindParam(':donnee', $donnee);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_NUM);
    return $data;
}