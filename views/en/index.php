<?php

session_start();
if ($_SESSION['lang'] == "en") {
	header("Location: domicile.php");
} else {
	header("Location: ../domicile.php");
}
