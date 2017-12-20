<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="text-center">Rejestracja - hasło</h1>
        </div>
        <div class="modal-body">
            <form class="col-md-12 center-block"
            action="zarejestruj-utworz-haslo.php?login=<?php echo $_GET['login'] ?>&kod=<?php echo $_GET['kod'] ?>"
            method="POST">
                <div class="form-group">
                    <input type="password" class="form-control input-lg" placeholder="Utwórz hasło" name="password">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-block btn-lg btn-primary" value="Dalej">
                </div>
            </form>
        </div>
        <div class="modal-footer informacja-dla-uzytkownika">
            <?php
                if (isset($_GET['haslo_za_krotkie'])) {
                    echo "<p>Minimalna dozwolona długość hasła to 7 znaków.</p>";
                }
                else if (isset($_GET['haslo_za_dlugie'])) {
                    echo "<p>Maksymalna dozwolona długość hasła to 255 znaków.</p>";
                }
            ?>
        </div>
    </div>
</div>
