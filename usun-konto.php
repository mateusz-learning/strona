<?php

$mysqli = new mysqli("127.0.0.1", "mateusz", "mateusz", "strona_internetowa");

if ($mysqli->connect_errno) {
	header("Location: index.php?page=rejestracja&blad-polaczenia-z-baza-danych");
	die();
}

session_start();

$login = $_SESSION['user'];
$result = $mysqli->query("SELECT * FROM uzytkownicy WHERE username = '". $login . "'");

$password_entered = htmlentities($_POST['password']);
$actual_password = $result->fetch_array(MYSQLI_ASSOC)["password"];


if ($password_entered == $actual_password) {
	$mysqli->query("DELETE FROM uzytkownicy WHERE username = '" . $login . "'");
	$mysqli->query("UPDATE uzytkownicy_niepotwierdzeni SET email = NULL WHERE username = '" . $login . "'");
	header("Location: index.php?page=konto-usuniete");
	session_destroy();
}
else {
	header("Location: index.php?page=usun-konto&zle-haslo");
}
