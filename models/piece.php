<?php

require_once 'db.php';

// function getPieces($domicileid) {
//     $db = connectDB();
//     $stmt = $db->prepare("SELECT * from `pieces` WHERE id_domicile=?");
//     $stmt->execute(array($domicileid));
//     $data = $stmt->fetchAll(PDO::FETCH_NUM);
//     return $data;
// }

function setPiece($domicileid, $nom, $pieceid) {
    $db = connectDB();
    $stmt = $db->prepare("INSERT INTO `pieces` VALUES(:id_piece, :nom, :id_domicile)");
    $stmt->bindParam(':id_piece', $pieceid);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':id_domicile', $domicileid);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_NUM);
    return $data;
}

function removePiece($pieceid) {
    $db = connectDB();
    $stmt = $db->prepare("DELETE FROM `pieces` WHERE id_piece=?");
    $stmt->execute(array($pieceid));
    $data = $stmt->fetchAll(PDO::FETCH_NUM);
    return $data;
}

?>