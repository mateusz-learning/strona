<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="text-center">Logowanie</h1>
        </div>
        <div class="modal-body">
            <form class="col-md-12 center-block" action="zaloguj.php" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control input-lg" placeholder="login" name="login">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control input-lg" placeholder="hasło" name="password">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-block btn-lg btn-primary" value="Dalej">
                    <span class="pull-right"><a href="index.php?page=rejestracja">Rejestracja</a></span>
                    <span><a href="index.php?page=przypomnij-haslo">Przypomnij hasło</a></span>
                </div>
            </form>
        </div>
        <div class="modal-footer informacja-dla-uzytkownika">
            <?php
                if (isset($_GET['zle-dane'])) {
                    echo "<p>Nie udało się zalogować.</p>";
                }
            ?>
        </div>
    </div>
</div>
