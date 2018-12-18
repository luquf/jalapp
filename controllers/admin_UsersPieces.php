<?php


require_once __DIR__.'/../models/piece.php';

function getUsersPieceAdmin($domicileid){
    return getPieces($domicileid);
}
?>