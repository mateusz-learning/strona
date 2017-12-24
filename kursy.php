<?php
	if (!isset($_SESSION['user'])) {
		header('Location: index.php?page=logowanie');
	}
?>

<div id="kursy" class="container">
	<h1>Gotowe zestawy słownictwa:</h1>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Nazwa zestawu</th>
				<th>Liczba słów</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
<?php
	$mysqli = new mysqli("127.0.0.1", "mateusz", "mateusz", "strona_internetowa");

	$result = $mysqli->query("SELECT * FROM kategorie");

	while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
		echo '
			<tr>
				<td>' . $row["category"] . '</td>
				<td>' . $row["number_of_flashcards"] . '</td>
				<td><a href="index.php?page=kursy-dodawanie&kurs-id=' . $row["ID"] . '"><button type="button" id="kurs-przycisk-' . $row["ID"] . '" class="btn btn-primary btn-sm">dodaj kurs</button></a></td>
			</tr>';
	}
?>
		</tbody>
	</table>
</div>
