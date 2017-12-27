<?php

$mysqli = new mysqli("127.0.0.1", "mateusz", "mateusz", "strona_internetowa");

if ($mysqli->connect_errno) {
	header("Location: index.php?page=rejestracja&blad-polaczenia-z-baza-danych");
	die();
}

$result = $mysqli->query("SELECT * FROM uzytkownicy");

$number_of_users = mysqli_num_rows($result);

echo '
	<div class="container">
		<h1>Witamy na naszej stronie</h1>
		<p>Obecnie mamy zarejestrowanych ' . $number_of_users . ' użytkowników.</p>
	</div>
';
