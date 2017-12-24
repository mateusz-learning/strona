<?php

$mysqli = new mysqli("127.0.0.1", "mateusz", "mateusz", "strona_internetowa");

if ($mysqli->connect_errno) {
	header("Location: index.php?page=rejestracja&blad-polaczenia-z-baza-danych");
	die();
}

$old_password_entered = $_POST['old-password'];
$new_password = $_POST['new-password'];
$new_password_confirm = $_POST['new-password-confirm'];

session_start();
$login = $_SESSION['user'];
$result = $mysqli->query("SELECT * FROM uzytkownicy WHERE username = '". $login . "'");

$old_password_from_database = $result->fetch_array(MYSQLI_ASSOC)["password"];

if ($old_password_entered != $old_password_from_database) {
	header('Location: index.php?page=zmien-haslo&zle-stare-haslo');
	die();
}
else if (strlen($new_password) < 7) {
	header('Location: index.php?page=zmien-haslo&haslo-za-krotkie');
	die();
}
else if (strlen($new_password) > 255) {
	header('Location: index.php?page=zmien-haslo&haslo-za-dlugie');
	die();
}
else if ($new_password != $new_password_confirm) {
	header('Location: index.php?page=zmien-haslo&hasla-sie-roznia');
	die();
}

$mysqli->query("UPDATE uzytkownicy SET password = '" . $new_password . "' WHERE username = '". $login . "'");

header('Location: index.php?page=haslo-zostalo-zmienione');
