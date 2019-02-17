<a href="detailsReunion" button type="button" class="btn btn-outline-dark float-right ">Retour<br>modifications</a>
<div class="col-lg-4 offset-lg-4 bg-light rounded" id="register-box">
      <h2 class="text-center mt-2">AJOUTER</h2>
    <h6 class="text-center mt-2">- un point d'ordre -</h6>
    <h4 class="text-center mt-2">Titre de la réunion </h4><br>

    <form action="" method="post" role="form" class="p-2" id="point-frm">
      <div class="form-group">
        <input type="text" name="titre" class="form-control" placeholder="Nouveau Point d'ordre">
        <textarea class="form-control" placeholder="Description" rows="3" id="comment" name="description"></textarea>
      <select multiple class="form-control" id="sel1" name="dossierid">
        <?php foreach ($dossiers as $dossier) :?>
        <option value="<?= $dossier->getId() ?>"><?= $dossier->getTitre() ?></option>
        <?php endforeach;?>
      </select>
      </div>
      <div class="form-group">
            <input type="submit" name="ajout" id="ajout" value="Ajouter" class="btn btn-dark btn-block">
      </div>
    </form>
</div>