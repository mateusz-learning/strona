<?php

$verification_code = rand(100000000, 999999999);

$to = htmlentities($_POST['email']);
$subject = "Nowe konto";
$messages= "Witaj " . htmlentities($_POST['login']) . ".\n\n" .
			"W celu kontynuowania rejestracji proszę otworzyć ponizszy link:\n" .
			"http://localhost/strona/index.php?page=rejestracja-potwierdzenie" .
			"&login=" . $login ."&kod=" . $verification_code;
 
if (mail($to, $subject, $messages)) {
	$mysqli->query("INSERT INTO `uzytkownicy_niepotwierdzeni` (`ID`, `username`, `email`, `verification_code`)
		VALUES (NULL, '" . $login . "', '" . $email . "', '" . $verification_code . "');");

	header("Location: index.php?page=rejestracja-wyslano-email");
}
else {
	header("Location: index.php?page=rejestracja&email-blad");
}

?>
