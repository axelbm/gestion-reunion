<div class="col-lg-8 offset-lg-2 bg-light rounded" id="dossier-box">
    <h2 class="text-center mt-2">Nouveau Dossier</h2>
    <br>
    <?php $f = new \core\FormView("AjouterDossier"); ?>
    <form action="" method="post" role="form" class="p-2" id="dossier-frm">

        <input type="hidden" name="formid" value="<?= $f->id ?>">
        <div class="form-group">
            <div class="form-group">
                <input type="text" name="pass" class="form-control" placeholder="Titre" required>
            </div>
            <div class="form-group">
                 <input id="x" value="Editor content goes here" type="hidden" name="content">
            <trix-editor input="x"></trix-editor><br>
            <input type="submit" name="ajouter" id="ajouter" value="Ajouter" class="btn btn-dark float-right"><br><br>
            </div>
        </div>
    </form>
</div>