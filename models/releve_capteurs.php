<?php

require_once "db.php";

function getAllReleveCapteurs() {
    $db = connectDB();
    $stmt = $db->prepare("SELECT * from releve_capteurs ORDER BY heure DESC");
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_NUM);
    return $data;
}

function getReleveCapteurByID($id) {
    $db = connectDB();
    $stmt = $db->prepare("SELECT * from `releve_capteurs` WHERE id_capteur=? ORDER BY heure DESC");
    $stmt->execute(array($id));
    $data = $stmt->fetchAll(PDO::FETCH_NUM);
    return $data;
}

function setReleveCapteur($uid, $id_capteur, $heure, $type, $donnee) {
    $db = connectDB();
    $stmt = $db->prepare("INSERT INTO `releve_capteurs` VALUES (:id_releve, :id_capteur, :heure, :typ, :donnee)");
    $stmt->bindParam(':id_releve', $uid);
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
    $stmt = $db->prepare("SELECT * from `releve_controleurs` ORDER BY heure DESC");
    $data = $stmt->fetchAll(PDO::FETCH_NUM);
    return $data;
}

function getReleveControleurByID($id) {
    $db = connectDB();
    $stmt = $db->prepare("SELECT * from `releve_controleurs` WHERE id_controleur=? ORDER BY heure DESC");
    $stmt->execute(array($id));
    $data = $stmt->fetchAll(PDO::FETCH_NUM);
    return $data;
}

function setReleveControleur($uid, $id_capteur, $heure, $type, $donnee) {
    $db = connectDB();
    $stmt = $db->prepare("INSERT INTO `releve_controleurs` VALUES (:id_releve, :id_capteur, :heure, :typ, :donnee)");
    $stmt->bindParam(':id_releve', $uid);
    $stmt->bindParam(':id_capteur', $id_capteur);
    $stmt->bindParam(':heure', $heure);
    $stmt->bindParam(':typ', $type);
    $stmt->bindParam(':donnee', $donnee);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_NUM);
    return $data;
}
