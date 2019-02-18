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


 <a href="#">Modifier</a> | <a href="#">Supprimer</a>
<hr>

<p><?= $pointdordre->getDescription() ?></p>