<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="text-center">Zmiana hasła</h1>
        </div>
        <div class="modal-body">
            <form class="col-md-12 center-block" action="zmien-haslo.php" method="POST">
                <div class="form-group">
                    <input type="password" class="form-control input-lg" placeholder="stare hasło" name="old-password">
                </div>
                <br>
                <div class="form-group">
                    <input type="password" class="form-control input-lg" placeholder="nowe hasło" name="new-password">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control input-lg" placeholder="nowe hasło - potwierdź" name="new-password-confirm">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-block btn-lg btn-primary" value="Dalej">
                </div>
            </form>
        </div>
        <div class="modal-footer informacja-dla-uzytkownika">
            <?php
                if (isset($_GET['zle-stare-haslo'])) {
                    echo "<p>Podane stare hasło jest nieprawidłowe.</p>";
                }
                else if (isset($_GET['haslo-za-krotkie'])) {
                    echo "<p>Minimalna dozwolona długość hasła to 7 znaków.</p>";
                }
                else if (isset($_GET['haslo-za-dlugie'])) {
                    echo "<p>Maksymalna dozwolona długość hasła to 255 znaków.</p>";
                }
                else if (isset($_GET['hasla-sie-roznia'])) {
                    echo "<p>Pola &quot;nowe hasło&quot; i &quot;nowe hasło - potwierdź&quot; muszą być takie same.</p>";
                }
            ?>
        </div>
    </div>
</div>
