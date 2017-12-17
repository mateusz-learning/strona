<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Strona</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	<div class="jumbotron">
        <div class="container text-center">
            <h1>Strona do nauki języków obcych</h1>      
        </div>
    </div>

    <div>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php?page=strona-glowna">Strona główna</a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="index.php?page=nauka">Nauka</a></li>
                    <li><a href="index.php?page=stworz-fiszki">Stwórz fiszki</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="profil.html"><span class="glyphicon glyphicon-user"></span> Profil</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Wyloguj się</a></li>
                </ul>
            </div>
        </nav>
    </div>

    <?php
        if (!isset($_GET['page'])) {
            header('Location: index.php?page=logowanie');
        }
        else if ($_GET['page'] == 'strona-glowna') {
            require('strona-glowna.php');
        }
        else if ($_GET['page'] == 'logowanie') {
            require('logowanie.php');
        }
        else if ($_GET['page'] == 'rejestracja') {
            require('rejestracja.php');
        }
        else if ($_GET['page'] == 'przypomnij-haslo') {
            require('przypomnij-haslo.php');
        }
        else if ($_GET['page'] == 'nauka') {
            require('nauka.php');
        }
        else if ($_GET['page'] == 'stworz-fiszki') {
            require('stworz-fiszki.php');
        }

        session_start();

        $user = "Mateusz";

        $_SESSION['user'] = "Wow";

        echo var_dump($_SESSION);
    ?>

	<script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
</body>
</html>
