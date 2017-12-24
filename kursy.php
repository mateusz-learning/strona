<?php
	if (!isset($_SESSION['user'])) {
		header('Location: index.php?page=logowanie');
	}
?>

<div class="container">
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
			<tr>
				<td>Kolory</td>
				<td>15</td>
				<td><button type="button" class="btn btn-primary btn-sm">dodaj słowa <span class="caret"></span></button></td>
			</tr>
			<tr>
				<td>Zwierzęta</td>
				<td>10</td>
				<td><button type="button" class="btn btn-primary btn-sm">dodaj słowa <span class="caret"></span></button></td>
			</tr>
			<tr>
				<td>Owoce i warzywa</td>
				<td>21</td>
				<td><button type="button" class="btn btn-primary btn-sm">dodaj słowa <span class="caret"></span></button></td>
			</tr>
		</tbody>
	</table>
</div>

<div class="container">
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
</div>

