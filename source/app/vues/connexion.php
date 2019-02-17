
<div class="col-lg-4 offset-lg-4 bg-light rounded" id="login-box">
    <h2 class="text-center mt-2">Se connecter</h2>

   

    
    <?php $f = new \core\FormView("Connexion"); ?>
    <form action="" method="post" role="form" class="p-2" id="login-frm">

        <input type="hidden" name="formid" value="<?= $f->id ?>">

        <?php $e = $f->erreur("courriel") ?>
        <div class="form-group" >
            <input type="text" name="courriel" class="form-control <?=$e?'is-invalid':""?>" placeholder="Courrier électronique" value="<?= $f->get("courriel") ?>" required>
            <?php if ($e): ?>
                <div class="invalid-feedback"><?=$e?></div>
            <?php endif ?>
        </div>

        <?php $e = $f->erreur("motDePasse") ?>
        <div class="form-group">
            <input type="password" name="motDePasse" class="form-control <?=$e?'is-invalid':""?>" placeholder="Mot de passe" value="<?= $f->get("motDePasse") ?>" required>
            <?php if ($e): ?>
                <div class="invalid-feedback"><?=$e?></div>
            <?php endif ?>
        </div>

        <div class="form-group">	
            <div class="custom-control custom-checkbox">	
                <input type="checkbox" name="resterConnecter" class="custom-control-input" id="customCheck" <?= $f->get("resterConnecter") == 'on' ? 'checked' : ''?>>	
                <label for="customCheck" class="custom-control-label">Se souvenir de moi</label>
            </div>	
        </div>

        <div class="form-group">
            <input type="submit" name="login" id="login" value="Se connecter" class="btn btn-dark btn-block">
        </div>

        <div class="form-group">
            <p class="text-center">
                Première fois ? <a href="inscription" id="register-btn">S'inscrire ici</a>
                <br>
                <a href="#" id="forgot-btn">Mot de passe oublié ?</a>
            </p>
        </div>
    </form>
</div>
