<div class="row">
    <!-- Section principal -->
    <div class="col-md-8">
        <!-- Section de la réunion -->
        <div>
            <h1><?= $reunion->getDate()->format('d F Y - H\hi') ?></h1>
            <p>Organisé par : <a href="#"><?= $reunion->getCreateur() ?></a></p>
            
            <?php if ($estcreateur): ?>
                <hr>
                <a href="#">Ajouter point d'ordre</a> | <a href="#">Annuler la réunion</a>
            <?php endif ?>
        </div>

        <!-- Section des point d'ordres -->
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
    
    <!-- Section des invitations -->
    <div class="col-md-4">
        <h2>Participant<?= count($participations) > 1 ? "s" : ""?></h2>
        <hr>

        <?php foreach ($participations as $i => $participation) : ?>
            <?= $i != 0 ? "<hr>" : ""?>
            <span><?= $participation->getUtilisateur()->getNomComplet() ?></span>
                <a class="float-right" href="#">Annuler l'invitation</a>
            <p><?php $participation->badge() ?></p>
        <?php endforeach ?>
    </div>
</div>
