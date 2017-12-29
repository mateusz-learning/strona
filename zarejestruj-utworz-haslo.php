<?php

$mysqli = new mysqli("127.0.0.1", "mateusz", "mateusz", "strona_internetowa");

if ($mysqli->connect_errno) {
	header("Location: index.php?page=rejestracja&blad-polaczenia-z-baza-danych");
	die();
}

$login = $_GET['login'];
$kod = $_GET['kod'];

$result = $mysqli->query("SELECT * FROM uzytkownicy_niepotwierdzeni WHERE
	username = '" . $login . "' AND verification_code = '" . $kod . "'");

if ($result->num_rows == 1) {
	$haslo = htmlentities($_POST['password']);
	$email = $result->fetch_array(MYSQLI_ASSOC)["email"];

	if (strlen($haslo) < 7) {
		header("Location: index.php?page=rejestracja-potwierdzenie&login=" . $login . "&kod=" . $kod . "&haslo-za-krotkie");
		die();
	}
	else if (strlen($haslo) > 255) {
		header("Location: index.php?page=rejestracja-potwierdzenie&login=" . $login . "&kod=" . $kod . "&haslo-za-dlugie");
		die();
	}

	
	$mysqli->query("INSERT INTO `uzytkownicy` (`username`, `password`, `email`)
		VALUES ('" . $login . "', '" . $haslo . "', '" . $email . "');");
	//$mysqli->query("DELETE FROM `uzytkownicy_niepotwierdzeni` WHERE `username` = '". $login . "'");

	header("Location: index.php?page=rejestracja-udala-sie");
}
else {
	header("Location: index.php?page=rejestracja-nie-udala-sie");
	die();
}
