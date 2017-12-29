<?php

$mysqli = new mysqli("127.0.0.1", "mateusz", "mateusz", "strona_internetowa");
$mysqli->set_charset("utf8");

if ($mysqli->connect_errno) {
	header("Location: index.php?page=rejestracja&blad-polaczenia-z-baza-danych");
	die();
}

$result = $mysqli->query("SELECT * FROM uzytkownicy");

$number_of_users = mysqli_num_rows($result);

echo '
	<div class="container">
		<h1>Witamy na naszej stronie</h1>
		<p class="zdanie">Obecnie mamy zarejestrowanych ' . $number_of_users . ' użytkowników.</p>
	</div>

	<br>

	<div class="container">
	    <h2>Ostatnio powtarzane fiszki</h2>
	    <p></p>            
	    <table id="ostatnio-dodane" class="table">
	    	<thead>
	    		<tr>
	                <td>polskie znacznie</td>
	                <td>angielskie znaczenie</td>
	                <td>autor</td>
	            </tr>
	    	</thead>
	        <tbody>
';
			$recently_added_flashcards = $mysqli->query("SELECT * FROM fiszki ORDER BY creation_date DESC LIMIT 10");
			$a = $mysqli->query("INSERT INTO `kategorie` (`ID`, `category`, `number_of_flashcards`) VALUES (NULL, 'ab', '51')");
			
			while ($row = $recently_added_flashcards->fetch_array(MYSQLI_ASSOC)) {
				echo '
					<tr>
		                <td>' . $row['pol'] . '</td>
		                <td>' . $row['eng'] . '</td>
		                <td>' . $row['author'] . '</td>
		            </tr>
	            ';
			}

echo '
	        </tbody>
	    </table>
	</div>
';
