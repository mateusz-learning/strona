<?php
	if (!isset($_SESSION['user'])) {
		header('Location: index.php?page=logowanie');
	}
?>

<?php

	$mysqli = new mysqli("127.0.0.1", "mateusz", "mateusz", "strona_internetowa");

	$result = $mysqli->query("SELECT * FROM fiszki WHERE category = 'Zwierzeta'");

	while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
		echo $row["pol"];
	}


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
					<tr>
						<td>pies</td>
						<td>dog</td>
					</tr>
					<tr>
						<td>kot</td>
						<td>cat</td>
					</tr>
					<tr>
						<td>małpa</td>
						<td>monkey</td>
					</tr>
					<tr>
						<td>pszczoła</td>
						<td>bee</td>
					</tr>
					<tr>
						<td>żółw</td>
						<td>turtle</td>
					</tr>
					<tr>
						<td>wąż</td>
						<td>snake</td>
					</tr>
					<tr>
						<td>jeż</td>
						<td>hedgehog</td>
					</tr>
				</tbody>
			</table>
			<button id="przycisk-dodaj-slowa" type="button" class="btn btn-primary btn-md center">dodaj zaznaczone słowa</button>
		</div>
	';

?>
