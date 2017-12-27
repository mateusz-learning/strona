<?php

if (!isset($_SESSION['user'])) {
	header('Location: index.php?page=logowanie');
}

session_start();
$user_id = $_SESSION['user_id'];

$mysqli = new mysqli("127.0.0.1", "mateusz", "mateusz", "strona_internetowa");

if ($mysqli->connect_errno) {
	header("Location: index.php?page=rejestracja&blad-polaczenia-z-baza-danych");
	die();
}

foreach ($_POST as $flashcard_id => $val) {
	$mysqli->query("INSERT INTO uzytkownicy_fiszki (user_id, flashcard_id, memory, next_revision)
		VALUES (" . $user_id . ", " . $flashcard_id . ", 0, CURRENT_TIMESTAMP)");
}

header("Location: index.php?page=fiszki-zostaly-dodane");
