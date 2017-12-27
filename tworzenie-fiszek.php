<?php
	if (!isset($_SESSION['user'])) {
		header('Location: index.php?page=logowanie');
	}

echo '
<div class="container">
    <form class="form-inline" action="stworz-fiszki.php" method="POST">
        <div class="form-group">
            <input class="form-control" type="text" placeholder="Słowo w języku polskim" name="pl-0">
            <input class="form-control" type="text" placeholder="Słowo w języku obcym" name="eng-0">
            <button id="dodaj-slowo" class="btn btn-default" type="button">Więcej</button>
            <p id="za-duzo">Naciśnij przycisk gotowe, aby dodać więcej fiszek.</p>
        </div>
        <br><br>
        <input class="btn btn-default" type="submit" value="Gotowe">
    </form>
</div>
';
