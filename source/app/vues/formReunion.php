<div class="col-lg-4 offset-lg-4 bg-light rounded" id="reunion-box">
    <h2 class="text-center mt-2">Nouvelle Réunion</h2>
    <br>
    <?php $f = new \core\FormView("AjouterReunion"); ?>
    <form action="" method="post" role="form" class="p-2" id="reunion-frm">

        <input type="hidden" name="formid" value="<?= $f->id ?>">
        <input type="hidden" name="createur" value="">
        <div class="form-group">
        <input type="date" name="name" class="form-control"  required>
        <input type="time" name="name" class="form-control"  required>
        <input type="submit" name="ajouter" id="ajouter" value="Ajouter" class="btn btn-dark btn-block"><br><br>
        </div>
    </form>
</div>
