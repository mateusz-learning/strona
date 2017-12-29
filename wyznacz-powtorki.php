<?php

$mysqli = new mysqli("127.0.0.1", "mateusz", "mateusz", "strona_internetowa");

if ($mysqli->connect_errno) {
	header("Location: index.php?page=rejestracja&blad-polaczenia-z-baza-danych");
	die();
}

session_start();
$user_id = $_SESSION['user_id'];

foreach ($_POST as $flashcard_id => $value) {
	$result = $mysqli->query("SELECT * FROM uzytkownicy_fiszki
		WHERE user_id = '" . $user_id ."' AND flashcard_id = '" . htmlentities($flashcard_id) . "'");

	$pamiec = $result->fetch_array(MYSQLI_ASSOC)["memory"];

	if ($pamiec == 0) {
		$mysqli->query("UPDATE uzytkownicy_fiszki
			SET memory = 1, next_revision = CURRENT_TIMESTAMP + INTERVAL 30 SECOND
			WHERE user_id = '" . $user_id . "' AND flashcard_id = '" . htmlentities($flashcard_id) . "'");
		$pamiec++;
	}
	else if ($pamiec == 1) {
		$mysqli->query("UPDATE uzytkownicy_fiszki
			SET memory = 2, next_revision = CURRENT_TIMESTAMP + INTERVAL 30 SECOND
			WHERE user_id = '" . $user_id . "' AND flashcard_id = '" . htmlentities($flashcard_id) . "'");
		$pamiec++;
	}
	else if ($pamiec == 2) {
		$mysqli->query("UPDATE uzytkownicy_fiszki
			SET memory = 3, next_revision = CURRENT_TIMESTAMP + INTERVAL 30 SECOND
			WHERE user_id = '" . $user_id . "' AND flashcard_id = '" . htmlentities($flashcard_id) . "'");
		$pamiec++;

	}
	else if ($pamiec == 3){
		$mysqli->query("UPDATE uzytkownicy_fiszki SET next_revision = NULL
			WHERE user_id = '" . $user_id . "' AND flashcard_id = '" . htmlentities($flashcard_id) . "'");
	}
}

header("Location: index.php?page=nauka");
