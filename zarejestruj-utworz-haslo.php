<?php

$mysqli = new mysqli("127.0.0.1", "mateusz", "mateusz", "strona_internetowa");

if ($mysqli->connect_errno) {
	header("Location: index.php?page=rejestracja&blad_polaczenia_z_baza_danych");
	die();
}

$result = $mysqli->query("SELECT * FROM uzytkownicy_nie_potwierdzeni WHERE username = '". $login . "'");
