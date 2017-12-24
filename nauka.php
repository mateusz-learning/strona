<?php
	if (!isset($_SESSION['user'])) {
		header('Location: index.php?page=logowanie');
	}
?>

<div class="container">
    <button type="button" class="btn" data-toggle="modal" data-target="#popup">ok</button>
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
