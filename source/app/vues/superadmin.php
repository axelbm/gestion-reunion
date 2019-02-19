<div class="col-lg-4 offset-lg-4 bg-light rounded" id="register-box">
    <h2 class="text-center mt-2">Droits d'administrations</h2>
    <h6 class="text-center mt-2">du super Admin !</h6><br><br><br>


    <?php $f = new \core\FormView("SuperAdmin"); ?>
    <form action="" method="post" role="form" class="p-2" id="admin-frm">

        <?php $e = $f->erreur("courriel") ?>
        <div class="form-group">
            <input type="text" name="courriel" class="form-control" placeholder="Courrier électronique" required>
            <?php if ($e): ?>
                <div class="invalid-feedback"><?=$e?></div>
            <?php endif ?>
        </div>

        <div class="form-group">
            <button type="submit" name="admin" value=true class="btn btn-success btn-block">Confier les droits d'administrateur</button>
        </div>
        <div class="form-group">
            <button type="submit" name="admin" value=false class="btn btn-danger btn-block">Retirer les droits d'administrateur</button>
        </div>
    </form>
</div>