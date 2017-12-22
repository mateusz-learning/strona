<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="text-center">W celu usunięcia konta, proszę podać hasło.</h1>
        </div>
        <div class="modal-body">
            <form class="col-md-12 center-block" action="usun-konto.php" method="POST">
                <div class="form-group">
                    <input type="password" class="form-control input-lg" placeholder="hasło" name="password">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-block btn-lg btn-primary" value="Dalej">
                </div>
            </form>
        </div>
        <div class="modal-footer informacja-dla-uzytkownika">
            <?php
                if (isset($_GET['zle-haslo'])) {
                    echo "<p>Podane hasło jest nieprawidłowe.</p>";
                }
            ?>
        </div>
    </div>
</div>
