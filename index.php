<?php
 
session_start();

if(!isset($_SESSION["connected"]) || $_SESSION["connected"] == "false") {
    header("Location: views/accueil.php");
} else {
    header("Location: views/accueil.php");
}
