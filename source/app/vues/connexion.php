
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
            <input type="submit" name="login" id="login" value="Se connecter" class="btn btn-dark btn-block">
        </div>

        <div class="form-group">
            <p class="text-center">Première fois ? <a href="#" id="register-btn">S'inscrire ici</a></p>
        </div>
    </form>
</div>

<div class="col-lg-4 offset-lg-4 bg-light rounded" id="register-box">
    <h2 class="text-center mt-2">S'inscrire</h2>

    <form action="" method="post" role="form" class="p-2" id="register-frm">
        <div class="form-group">
        <input type="text" name="name" class="form-control" placeholder="Prénom" required>
        </div>
        <div class="form-group">
        <input type="text" name="name" class="form-control" placeholder="Nom" required>
        </div>
        <div class="form-group">
        <input type="text" name="email" class="form-control" placeholder="Courrier électronique" required>
        </div>
        <div class="form-group">
        <input type="password" name="pass" class="form-control" placeholder="Mot de passe" required>
        </div>
        <div class="form-group">
        <input type="password" name="cpass" class="form-control" placeholder="Veuillez confirmer votre mot de passe" required>
        </div>
        <div class="form-group">
        <input type="text" name="name" class="form-control" placeholder="*No. d'Invitation" required>
        </div>
        <div class="form-group">
            <input type="submit" name="register" id="register" value="S'inscrire" class="btn btn-dark btn-block">
        </div>
        <div class="form-group">
            <p class="text-center">Déjà inscrit ? <a href="#" id="login-btn">Se connecter ici</a></p>
        </div>
    </form>
</div>