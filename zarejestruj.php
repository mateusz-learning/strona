<?php

$mysqli = new mysqli("127.0.0.1", "mateusz", "mateusz", "strona_internetowa");

if ($mysqli->connect_errno) {
	header("Location: index.php?page=rejestracja&blad-polaczenia-z-baza-danych");
	die();
}

$login = htmlentities($_POST['login']);
$email = htmlentities($_POST['email']);

if (strlen($login) < 3) {
	header("Location: index.php?page=rejestracja&login-za-krotki");
	die();
}
else if (strlen($login) > 20) {
	header("Location: index.php?page=rejestracja&login-za-dlugi");
	die();
}
else if (!ctype_alnum($login)) {
	header("Location: index.php?page=rejestracja&login-niedozwolone-znaki");
	die();
}
else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	header("Location: index.php?page=rejestracja&niepoprawny-email");
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
		header("Location: index.php?page=rejestracja&login-istnieje");
	}
	else {
		header("Location: index.php?page=rejestracja&email-istnieje");
	}
}
