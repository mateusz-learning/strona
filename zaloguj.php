<?php

$mysqli = new mysqli("127.0.0.1", "mateusz", "mateusz", "strona_internetowa");

if ($mysqli->connect_errno) {
	echo '
		<div class="alert alert-danger blad_polaczenia_baza_danych">
			<b><p>Nie udało się nawiązać połączenia z bazą danych</p></b>
		</div>
	';
}

$login = $_POST['login'];
$password = $_POST['password'];

$result = $mysqli->query("SELECT * FROM uzytkownicy 
	WHERE username = '". $login . "' AND password = '" . $password . "'");

if ($result->num_rows == 1) {
	$row = $result->fetch_array(MYSQLI_ASSOC);

	session_start();
	$_SESSION['user'] = $row['username'];
	$_SESSION['email'] = $row['email'];
}
else {

}

//$mysqli->close();