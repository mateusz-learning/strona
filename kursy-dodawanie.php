<?php
	if (!isset($_SESSION['user'])) {
		header('Location: index.php?page=logowanie');
	}
?>

<?php

	$mysqli = new mysqli("127.0.0.1", "mateusz", "mateusz", "strona_internetowa");
	$mysqli->set_charset("utf8");

	$category_name = $mysqli->query("SELECT * FROM kategorie WHERE id = '". $_GET['kurs-id'] . "'")->fetch_array(MYSQLI_ASSOC)['category'];

	$result = $mysqli->query("SELECT * FROM fiszki WHERE category = '" . $category_name . "'");

	echo '
		<div id="kursy-slowa" class="container">
			<h1>Zwierzęta</h1>
			<p>Proszę wybrać fiszki, które chcesz dodać.</p>
			<table id="kurs-slowa" class="table">
				<thead>
					<tr>
						<th>Polskie znaczenie</th>
						<th>Angielskie znaczenie</th>
					</tr>
				</thead>
				<tbody>
	';

	while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
		echo '
			<tr id="slowo-' . $row['ID'] . '" class="success">
				<td>' . $row['pol'] . '</td>
				<td>' . $row['eng'] . '</td>
			</tr>
		';
	}
	echo '
				</tbody>
			</table>
		</div>
	';


	$result = $mysqli->query("SELECT * FROM fiszki WHERE category = '" . $category_name . "'");

	echo '
		<div class="container">
			<form action="a.php" method="POST">
	';

while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
		echo '
				<input type="hidden" name="' . $row['ID'] . '" value="">
		';
	}

	echo '
				<input id="przycisk-dodaj-slowa" type="submit" class="btn btn-primary btn-md center" value="dodaj zaznaczone słowa">
			</form>
		</div>
	';
