<?php

$mysqli = new mysqli("127.0.0.1", "mateusz", "mateusz", "strona_internetowa");

if ($mysqli->connect_errno) {
	header("Location: index.php?page=rejestracja&blad_polaczenia_z_baza_danych");
	die();
}

$login = $_GET['login'];
$kod = $_GET['kod'];

$result = $mysqli->query("SELECT * FROM uzytkownicy_niepotwierdzeni WHERE
	username = '" . $login . "' AND verification_code = '" . $kod . "'");

if ($result->num_rows == 1) {
	$haslo = $_POST['password'];
	$email = $result->fetch_array(MYSQLI_ASSOC)["email"];

	if (strlen($haslo) < 7) {
		header("Location: index.php?page=rejestracja-potwierdzenie&login=" . $login . "&kod=" . $kod . "&haslo_za_krotkie");
		die();
	}
	else if (strlen($haslo) > 255) {
		header("Location: index.php?page=rejestracja-potwierdzenie&login=" . $login . "&kod=" . $kod . "&haslo_za_dlugie");
		die();
	}

	
	$mysqli->query("INSERT INTO `uzytkownicy` (`username`, `password`, `email`)
		VALUES ('" . $login . "', '" . $haslo . "', '" . $email . "');");
	$mysqli->query("DELETE FROM `uzytkownicy_niepotwierdzeni` WHERE `username` = '". $login . "'");

	header("Location: index.php?page=rejestracja_udala_sie");
}
else {
	header("Location: index.php?page=rejestracja_nie_udala_sie");
	die();
}
