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

Réunion du 
<a href="<?= WEBROOT.'/detailsreunion/'.$reunion->getId()?>">
    <?= $reunion->getDate()->format('d F Y - H\hi')?>
</a>
<hr>

<p><?= $pointdordre->getDescription() ?></p>


<hr>

<h4>Compte rendu</h4>
<br>

<?php $f = $vue->newForm("modifCompteRendu"); ?>
<form method="post">
    <input type="hidden" name="formid" value="<?= $f->id ?>">

    <div class="form-group">
        <input id="compterendu" value="<?=$pointdordre->getCompteRendu()?>" type="hidden" name="compterendu">
        <trix-editor input="compterendu" style="min-height:200px"></trix-editor>
    </div>

    <div class="form-group">
        <input type="submit" name="Sauvegarder"  class="btn btn-dark"><br><br>
    </div>
</form>