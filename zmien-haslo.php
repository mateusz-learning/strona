<?php

$old_password = $_POST['old-password'];
$new_password = $_POST['new-password'];
$new_password_confirm = $_POST['new-password-confirm'];

echo $old_password . " " . $new_password . " " . $new_password_confirm;

if (strlen($new_password) < 7) {
	header('Location: index.php?page=zmien-haslo&haslo-za-krotkie');
	die();
}
else if (strlen($new_password) > 255) {
	header('Location: index.php?page=zmien-haslo&haslo-za-dlugie');
	die();
}
else if ($new_password != $new_password_confirm) {
	header('Location: index.php?page=zmien-haslo&hasla-sie-roznia');
	die();
}
