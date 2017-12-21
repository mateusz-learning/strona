<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="text-center">Przypomnij hasło</h1>
        </div>
        <div class="modal-body">
            <form class="col-md-12 center-block" action="przypomnij-haslo.php" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control input-lg" placeholder="e-mail" name="email">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-block btn-lg btn-primary" value="Dalej">
                    <span class="pull-right"><a href="index.php?page=logowanie">Logowanie</a></span>
                    <span><a href="index.php?page=rejestracja">Rejestracja</a></span>
                </div>
            </form>
        </div>
        <div class="modal-footer informacja-dla-uzytkownika">
            <?php
                if (isset($_GET['niepoprawny_email'])) {
                    echo "<p>Proszę podać poprawny email.</p>";
                }
                else if (isset($_GET['email_nie_znaleziono'])) {
                    echo "<p>Podany adres email nie istnieje.</p>";
                }
            ?>
        </div>
    </div>
</div>
