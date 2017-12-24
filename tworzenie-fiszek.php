<?php
	if (!isset($_SESSION['user'])) {
		header('Location: index.php?page=logowanie');
	}
?>

<div class="container">
    <form class="form-inline" action="a.php">
        <div class="form-group">
            <input type="text" class="form-control" id="pl-1" placeholder="Słowo w języku polskim">
            <input type="text" class="form-control" id="eng-1" placeholder="Słowo w języku obcym">
            <button type="button" class="btn btn-default" id="dodaj-slowo">Więcej</button>
            <p id="za-duzo">Naciśnij przycisk gotowe, aby dodać więcej fiszek.</p>
        </div>
        <br><br>
        <button type="submit" class="btn btn-default">Gotowe</button>
    </form>
</div>
