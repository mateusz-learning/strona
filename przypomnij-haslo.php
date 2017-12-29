<?php

$email = htmlentities($_POST['email']);

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: index.php?page=przypomnij-haslo&niepoprawny-email");
	die();
}

$mysqli = new mysqli("127.0.0.1", "mateusz", "mateusz", "strona_internetowa");

if ($mysqli->connect_errno) {
	header("Location: index.php?page=rejestracja&blad-polaczenia-z-baza-danych");
	die();
}

$result = $mysqli->query("SELECT * FROM uzytkownicy WHERE email = '" . $email . "'");
$hasło = $result->fetch_array(MYSQLI_ASSOC)["password"];

if ($result->num_rows == 0) {
	header("Location: index.php?page=przypomnij-haslo&email-nie-znaleziono");
	die();
}
else {
	$to = htmlentities($_POST['email']);
	$subject = "Przypominanie hasła";
	$messages= "Witaj " . htmlentities($_POST['login']) . ".\n\n" .
			"Twoje hasło: " . $hasło;
}

if (mail($to, $subject, $messages)) {
	header("Location: index.php?page=wyslano-email-przypomnienie");
}
else {
	header("Location: index.php?page=rejestracja&email-blad");
}
