<?php

session_start();
echo $_SESSION['user'] . "<br>";

foreach ($_POST as $name => $val) {
     echo $name . "<br>";
}
