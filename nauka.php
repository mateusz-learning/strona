<?php
	if (!isset($_SESSION['user'])) {
		header('Location: index.php?page=logowanie');
	}

$mysqli = new mysqli("127.0.0.1", "mateusz", "mateusz", "strona_internetowa");
$mysqli->set_charset("utf8");

if ($mysqli->connect_errno) {
    echo '
        <div class="alert alert-danger blad-polaczenia-baza-danych">
            <b><p>Nie udało się nawiązać połączenia z bazą danych</p></b>
        </div>
    ';
}

$user_id = $_SESSION['user_id'];

$result = $mysqli->query("SELECT * FROM uzytkownicy_fiszki
    WHERE user_id = '". $user_id . "' AND next_revision < CURRENT_TIMESTAMP LIMIT 5");
$flashcards_numer = $mysqli->query("SELECT * FROM uzytkownicy_fiszki
    WHERE user_id = '" . $user_id . "' AND next_revision IS NOT NULL")->num_rows;
$flashcards_to_learn = $result->num_rows;

echo '
    <div class="container">
        <h2>Witaj ' . $_SESSION['user'] . '.</h2>
        <p class="abc">Liczba fiszek w trakcie nauki: ' . $flashcards_numer . '.</p>
        <p class="abc">Liczba fiszek do przejrzenia: ' . $flashcards_to_learn . '.</p>
    </div>
';

echo '
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-body">
            <div id ="slowo" class="text-center">
                <p></p>
            </div>
            <div id ="komunikat-koniec-rundy" class="text-center">
            </div>
            <div id="odwroc-fiszke">
                <div id="fiszka-pokaz-odpowiedz" class="text-center">
                    <button id="sprawdz-slowo" type="button" class="btn btn-primary">Pokaż odpowiedź</button>
                </div>
                <div id="fiszka-wiem-nie-wiem" class="text-center">
                    <button id="wiem-przycisk" type="button" class="btn btn-success">Wiem</button>
                    <button id="nie-wiem-przycisk" type="button" class="btn btn-danger">Nie wiem</button>
                </div>
            </div>
            <form id="form-wyslij-fiszki" class="text-center" action="a.php" method="POST">
            ';
                while ($row = $result->fetch_assoc()) {
                    $flashcard_pl = $mysqli->query("SELECT * FROM fiszki WHERE ID = '" . $row['flashcard_id'] . "'")
                        ->fetch_assoc()['pol'];
                    $flashcard_eng = $mysqli->query("SELECT * FROM fiszki WHERE ID = '" . $row['flashcard_id'] . "'")
                        ->fetch_assoc()['eng'];

                    echo '
                        <input type="hidden" name="" value="' . $flashcard_pl . '">
                        <input type="hidden" name="' . $row['flashcard_id'] . '" value="' . $flashcard_eng . '">';
                }
                    echo '
                        <p id="liczba-fiszek">' . $result->num_rows . '</p>
                    ';
            echo '
                <input id="przycisk-wyslij-fiszki" class="btn btn-primary btn-md center" type="submit" value="Dalej">
            </form>
        </div>
        <div class="modal-footer">
            <div class="progress">
                <div id="pasek-dobra-odpowiedz" class="progress-bar progress-bar-success" role="progressbar"" aria-valuemin="0" aria-valuemax="100" style="width:0%">
                </div>
                <div id="pasek-zla-odpowiedz" class="progress-bar progress-bar-danger" role="progressbar"" aria-valuemin="0" aria-valuemax="100" style="width:0%">
                </div>
            </div> 
        </div>
    </div>
</div>
';
