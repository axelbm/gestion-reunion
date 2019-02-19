<div class="col-lg-4 offset-lg-4 bg-light rounded" id="register-box">
    <h2 class="text-center mt-2">Inviter un membre</h2>
    <h6 class="text-center mt-2">à rejoindre AFH</h6><br><br><br>

    <?php $f = $vue->newForm("Invitation"); ?>
    <form action="" method="post" role="form" class="p-2" id="register-frm">

        <input type="hidden" name="formid" value="<?= $f->id ?>">
        
        <?php $e = $f->erreur("courriel") ?>
        <div class="form-group">
            <input type="text" name="courriel" class="form-control <?=$e?'is-invalid':""?>" placeholder="Courrier électronique" value="<?= $f->get("courriel") ?>" required>
            <?php if ($e): ?>
                <div class="invalid-feedback"><?=$e?></div>
            <?php endif ?>
        </div>
        <div class="form-group">
            <input type="submit" name="login" id="login" value="Inviter" class="btn btn-primary btn-block">
        </div>
    </form>
</div>