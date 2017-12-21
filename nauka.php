<?php
	if (!isset($_SESSION['user'])) {
		header('Location: index.php?page=logowanie');
	}
?>

<p>Strona do nauki</p>
