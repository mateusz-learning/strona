<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="text-center">Rejestracja</h1>
        </div>
        <div class="modal-body">
            <form class="col-md-12 center-block" action="zarejestruj.php" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control input-lg" placeholder="login" name="login">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control input-lg" placeholder="e-mail" name="email">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-block btn-lg btn-primary" value="Dalej">
                    <span class="pull-right"><a href="index.php?page=logowanie">Logowanie</a></span>
                    <span><a href="index.php?page=przypomnij-haslo">Przypomnij hasło</a></span>
                </div>
            </form>
        </div>
        <div class="modal-footer juz-istnieje">
            <?php
                if (isset($_GET['login_istnieje'])) {
                    echo "<p>Podany login już istnieje.</p>";
                }
                else if (isset($_GET['email_istnieje'])) {
                    echo "<p>Podany email już istnieje.</p>";
                }
                else if (isset($_GET['login_za_krotki'])) {
                    echo "<p>Podany login jest za krótki.</p>";
                }
                else if (isset($_GET['login_niedozwolone_znaki'])) {
                    echo "<p>Login może zawierać tylko litery i cyfry.</p>";
                }
                else if (isset($_GET['niepoprawny_email'])) {
                    echo "<p>Proszę podać poprawny email.</p>";
                }
            ?>
        </div>
    </div>
</div>
