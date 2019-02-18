<div class="container">
    <h1 align="center"> - Modifications - </h1> 
    <br>
    <h6 align="right"> * Administrateur </h6>

    <a href="calendrier" button type="button" class="btn btn-outline-dark float-right ">Revenir à mes invitations</a> <br><br>
<div class="card border-dark mb-3" style="max-width: 26rem;">

    <div class="card-body">
      <h4 class="card-title"><?= $dossier->getNom() ?></h4>
      <p class="card-text"><?= $dossier->getDescription() ?></p><br>
      <a href="<?= WEBROOT."modifDossier/".$dossier->getId() ?>" class="card-link">Modifier </a>
      <a href="#" class="card-link">Supprimer</a><br>
    </div>
  </div><br>


  <div class="column" style="background-color:#aaa;">
    <h5>Point(s) d'ordre relié(s)</h5>
    <div>
    <?php foreach ($pointdordres as $pointdordre): ?>
        <hr>
        <h4>
            <?php if ($pointdordre->getCompteRendu() != ""): ?>
                <span class="badge badge-info">Terminé</span>
            <?php endif ?>
            <?= $pointdordre->getTitre() ?>
        <?php if ($dossier = $pointdordre->getDossier()):?>
            <small>
                - <a href="#"><?= $dossier->getNom() ?></a>
            </small>
        <?php endif ?>
        </h4>

        
        <a href="#">Détails</a>
        <?php if ($estcreateur): ?>
            | <a href="#">Modifier</a> | <a href="#">Annuler</a>
        <?php endif ?>
        <hr>

        <p><?= $pointdordre->getDescription() ?></p>
    <?php endforeach ?>
    </div>
  </div>
</div>