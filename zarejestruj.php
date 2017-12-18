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
$email = $_POST['email'];

if (strlen($login) < 3) {
	header("Location: index.php?page=rejestracja&login_za_krotki");
}
else if (!ctype_alnum($login)) {
	header("Location: index.php?page=rejestracja&login_niedozwolone_znaki");
}
else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	header("Location: index.php?page=rejestracja&niepoprawny_email");
}

$result = $mysqli->query("SELECT * FROM uzytkownicy 
	WHERE username = '". $login . "' OR email = '" . $email . "'");

if ($result->num_rows == 0) {

}
else {
	$search_login = $mysqli->query("SELECT * FROM uzytkownicy WHERE username = '". $login . "'");

	if ($search_login->num_rows != 0) {
		header("Location: index.php?page=rejestracja&login_istnieje");
	}
	else {
		header("Location: index.php?page=rejestracja&email_istnieje");
	}
}
