<?php

require_once 'db.php';

function getAllCapteurs() {
    $db = connectDB();
    $stmt = $db->prepare("SELECT * from `capteurs`");
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_NUM);
    return $data;
}

function getCapteurs($pieceid) {
    $db = connectDB();
    $stmt = $db->prepare("SELECT * from `capteurs` WHERE id_piece=?");
    $stmt->execute(array($pieceid));
    $data = $stmt->fetchAll(PDO::FETCH_NUM);
    return $data;
}

function getCapteurState($capteurid) {
    $db = connectDB();
    $stmt = $db->prepare("SELECT etat from `capteurs` WHERE id_capteur=?");
    $stmt->execute(array($capteurid));
    $data = $stmt->fetchAll(PDO::FETCH_NUM);
    return $data;
}

function setCapteurState($capteurid, $etat) {
    $db = connectDB();
    $stmt = $db->prepare("UPDATE `capteurs` SET etat=:etat WHERE id_capteur=:capteurid");
    $stmt->bindParam(':etat', $etat);
    $stmt->bindParam(':capteurid', $capteurid);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_NUM);
    return $data;
}

function setCapteur($capteurid, $nom, $type, $etat, $pieceid) {
    $db = connectDB();
    $stmt = $db->prepare("INSERT INTO `capteurs` VALUES(:id_capteur, :nom, :typ, :etat, :id_piece)");
    $stmt->bindParam(':id_capteur', $capteurid);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':typ', $type);
    $stmt->bindParam(':etat', $etat);
    $stmt->bindParam(':id_piece', $pieceid);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_NUM);
    return $data;
}

function removeCapteur($capteurid) {
    $db = connectDB();
    $stmt = $db->prepare("DELETE FROM `capteurs` WHERE id_capteur=?");
    $stmt->execute(array($capteurid));
    $data = $stmt->fetchAll(PDO::FETCH_NUM);
    return $data;
}

function getAllControleurs() {
    $db = connectDB();
    $stmt = $db->prepare("SELECT * from `controleurs`");
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_NUM);
    return $data;
}

function getControleurs($pieceid) {
    $db = connectDB();
    $stmt = $db->prepare("SELECT * from `controleurs` WHERE id_piece=?");
    $stmt->execute(array($pieceid));
    $data = $stmt->fetchAll(PDO::FETCH_NUM);
    return $data;
}

function setControleur($controleurid, $nom, $type, $etat, $pieceid) {
    $db = connectDB();
    $stmt = $db->prepare("INSERT INTO `controleurs` VALUES(:id_controleur, :nom, :typ, :etat, :id_piece)");
    $stmt->bindParam(':id_controleur', $controleurid);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':typ', $type);
    $stmt->bindParam(':etat', $etat);
    $stmt->bindParam(':id_piece', $pieceid);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_NUM);
    return $data;
}

function setControleurState($controleurid, $etat) {
    $db = connectDB();
    $stmt = $db->prepare("UPDATE `controleurs` SET etat=:etat WHERE id_controleur=:controleurid");
    $stmt->bindParam(':etat', $etat);
    $stmt->bindParam(':controleurid', $controleurid);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_NUM);
    return $data;
}

function getControleurState($capteurid) {
    $db = connectDB();
    $stmt = $db->prepare("SELECT etat from `controleurs` WHERE id_controleur=?");
    $stmt->execute(array($capteurid));
    $data = $stmt->fetchAll(PDO::FETCH_NUM);
    return $data;
}

function removeControleur($controleurid) {
    $db = connectDB();
    $stmt = $db->prepare("DELETE FROM `controleurs` WHERE id_controleur=?");
    $stmt->execute(array($controleurid));
    $data = $stmt->fetchAll(PDO::FETCH_NUM);
    return $data;
}

?>