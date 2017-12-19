<?php

$verification_code = rand(100000000, 999999999);

$to = $_POST['email'];
$subject = "Nowe konto";
$messages= "Witaj " . $_POST['login'] . ".\n\n" .
			"W celu kontynuowania rejestracji proszę otworzyć ponizszy link:\n" .
			"http://localhost/strona/index.php?page=rejestracja-potwierdzenie" .
			"&login=" . $login ."&kod=" . $verification_code;
 
if (mail($to, $subject, $messages)) {
	$mysqli->query("INSERT INTO `uzytkownicy_nie_potwierdzeni` (`ID`, `username`, `email`, `verification_code`)
		VALUES (NULL, '" . $login . "', '" . $email . "', '" . $verification_code . "');");

	header("Location: index.php?page=rejestracja_utworz_haslo");
}
else {
	header("Location: index.php?page=rejestracja&email_blad");
}

?>
