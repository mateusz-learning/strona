<?php

$mysqli = new mysqli("127.0.0.1", "mateusz", "mateusz", "strona_internetowa");
$mysqli->set_charset("utf8");

if ($mysqli->connect_errno) {
	echo '
		<div class="alert alert-danger blad-polaczenia-baza-danych">
			<b><p>Nie udało się nawiązać połączenia z bazą danych</p></b>
		</div>
	';
}

session_start();
$user_id = $_SESSION['user_id'];
$author = $_SESSION['user'];

for ($i=0; $i<10; $i++) {
	if (htmlentities(isset($_POST['pl-' . $i]))) {
		$polish_meaning = htmlentities($_POST['pl-' . $i]);
		$english_meaning = htmlentities($_POST['eng-' . $i]);

		if (strlen($polish_meaning) > 0 && strlen($english_meaning)) {
			$mysqli->query("INSERT INTO fiszki (pol, eng, author)
				VALUES ('". $polish_meaning . "', '" . $english_meaning . "', '" . $author . "')");

			$category_name = $mysqli->query("SELECT * FROM kategorie WHERE id = '1'")->fetch_array(MYSQLI_ASSOC)['category'];
			$flashcard_id = $mysqli->query("SELECT * FROM fiszki WHERE
				pol = '" . $polish_meaning . "' AND eng = '" . $english_meaning . "' AND author = '" . $author . "'")
				->fetch_array(MYSQLI_ASSOC)['ID'];
			
			$mysqli->query("INSERT INTO uzytkownicy_fiszki (user_id, flashcard_id, memory, next_revision)
				VALUES (" . $user_id . ", " . $flashcard_id . ", 0, CURRENT_TIMESTAMP)");
		}
	}
	else {
		break;
	}
}

header("Location: index.php?page=fiszki-zostaly-dodane");
