<div class="col-lg-4 offset-lg-4 bg-light rounded" id="dossier-box">
    <h2 class="text-center mt-2">Nouveau Dossier</h2>
    <br>
    <?php $f = new \core\FormView("AjouterDossier"); ?>
    <form action="" method="post" role="form" class="p-2" id="dossier-frm">

        <input type="hidden" name="formid" value="<?= $f->id ?>">
        <div class="form-group">
        <div class="form-group">
        <input type="text" name="nom" class="form-control" placeholder="Titre" required>
        </div>
        <div class="form-group">
        <input id="x" value="" type="hidden" name="description">
        <trix-editor input="x"></trix-editor>
        </div>
        <input type="submit" name="ajouter" id="ajouter" value="Ajouter" class="btn btn-dark btn-block"><br><br>
        </div>
    </form>
</div>