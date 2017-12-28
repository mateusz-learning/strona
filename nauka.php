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

$result = $mysqli->query("SELECT * FROM uzytkownicy_fiszki WHERE user_id = 60 LIMIT 5");
$flashcards_to_learn = $mysqli->query("SELECT * FROM uzytkownicy_fiszki WHERE user_id = " . $user_id)->num_rows;

echo '
    <div class="container">
        <h2>Witaj ' . $_SESSION['user'] . '.</h2>
        <p>Liczba fiszek w trakcie nauki: ' . $flashcards_to_learn . '.</p>
    </div>
';

echo '
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            
        </div>
        <div class="modal-body">
            <div id="slowo_polskie" class="text-center">
                <p class="przyklad">Słowo w języku polskim</p>
            </div>
            <div id="slowo_obce" class="text-center">
                <p class="przyklad">Słowo w języku angielskim</p>
            </div>
            <div id="pokaz_odpowiedz" class="text-center">
                <button id="sprawdz_slowo" type="button" class="btn btn-primary">Pokaż odpowiedź</button>
            </div>
            <div id="wiem_nie_wiem" class="text-center">
                <button id="wiem_przycisk" type="button" class="btn btn-primary">Wiem</button>
                <button id="nie_wiem_przycisk" type="button" class="btn btn-primary">Nie wiem</button>
            </div>
            <form class="text-center" action="" method="POST">
            ';
                while ($row = $result->fetch_assoc()) {
                    $flashcard_pl = $mysqli->query("SELECT * FROM fiszki WHERE ID = '" . $row['flashcard_id'] . "'")
                        ->fetch_assoc()['pol'];
                    $flashcard_eng = $mysqli->query("SELECT * FROM fiszki WHERE ID = '" . $row['flashcard_id'] . "'")
                        ->fetch_assoc()['eng'];

                    echo '
                        <input type="text" name="pl-' . $row['flashcard_id'] . '" value="' . $flashcard_pl . '">
                        <input type="text" name="eng-' . $row['flashcard_id'] . '" value="' . $flashcard_eng . '"><br>';
                }
            echo '
                <input id="przycisk-dodaj-slowa" class="btn btn-primary btn-md center" type="submit" value="dodaj zaznaczone słowa">
            </form>
        </div>
        <div class="modal-footer">
            
        </div>
    </div>
</div>
';



/*
echo '
<div class="container">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#popup">Nauka</button>
</div>

<div class="modal fade" id="popup" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <p>Nazwa kursu</p>
            </div>
            <div class="modal-body">
                <div id="slowo_polskie" class="text-center">
                    <p class="przyklad">Słowo w języku polskim</p>
                </div>
                <div id="slowo_obce" class="text-center">
                    <p class="przyklad">Słowo w języku angielskim</p>
                </div>
                <div id="pokaz_odpowiedz" class="text-center">
                    <button id="sprawdz_slowo" type="button" class="btn btn-primary">Pokaż odpowiedź</button>
                </div>
                <div id="wiem_nie_wiem" class="text-center">
                    <button id="wiem_przycisk" type="button" class="btn btn-primary">Pokaż odpowiedź</button>
                    <button id="nie_wiem_przycisk" type="button" class="btn btn-primary">Pokaż odpowiedź</button>
                </div>
            </div>
            <div class="modal-footer">
                <p>text</p>
            </div>
        </div>
    </div>
</div>
';
*/
