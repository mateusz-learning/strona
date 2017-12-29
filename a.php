<?php

foreach ($_POST as $a => $b) {
	echo $a . "<br>";
}

header('Location: index.php?page=nauka');
