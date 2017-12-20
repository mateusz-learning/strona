<?php

$mysqli = new mysqli("127.0.0.1", "mateusz", "mateusz", "strona_internetowa");

if ($mysqli->connect_errno) {
	header("Location: index.php?page=rejestracja&blad_polaczenia_z_baza_danych");
	die();
}

$login = $_POST['login'];
$email = $_POST['email'];

if (strlen($login) < 3) {
	header("Location: index.php?page=rejestracja&login_za_krotki");
	die();
}
else if (strlen($login) > 20) {
	header("Location: index.php?page=rejestracja&login_za_dlugi");
	die();
}
else if (!ctype_alnum($login)) {
	header("Location: index.php?page=rejestracja&login_niedozwolone_znaki");
	die();
}
else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	header("Location: index.php?page=rejestracja&niepoprawny_email");
	die();
}

$result = $mysqli->query("SELECT * FROM uzytkownicy 
	WHERE username = '". $login . "' OR email = '" . $email . "'");

$result_unverified = $mysqli->query("SELECT * FROM uzytkownicy_niepotwierdzeni 
	WHERE username = '". $login . "' OR email = '" . $email . "'");

if ($result->num_rows == 0 && $result_unverified->num_rows == 0) {
	require("zarejestruj-email.php");
}
else {
	$search_login = $mysqli->query("SELECT * FROM uzytkownicy WHERE username = '". $login . "'");
	$search_login_unverified = $mysqli->query("SELECT * FROM uzytkownicy_niepotwierdzeni WHERE username = '". $login . "'");

	if ($search_login->num_rows != 0 || $search_login_unverified->num_rows != 0) {
		header("Location: index.php?page=rejestracja&login_istnieje");
	}
	else {
		header("Location: index.php?page=rejestracja&email_istnieje");
	}
}
