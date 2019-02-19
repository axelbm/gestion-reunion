<div class="row">
    <!-- Section principal -->
    <div class="col-md-8">
        <!-- Section de la réunion -->
        <div>
            <h1><?= $reunion->getDate()->format('d F Y - H\hi') ?></h1>
            <p>Organisé par : <a href="#"><?= $reunion->getCreateur() ?></a></p>
            
            <?php if ($estcreateur): ?>
                <hr>
                <?php if ($ajouterPointDordre): ?>
                    <a href="<?= WEBROOT."detailsreunion/".$reunion->getId() ?>">Retour</a> 
                <?php else: ?>
                    <a href="<?= WEBROOT."detailsreunion/".$reunion->getId().'/ajouterpointdordre' ?>">Ajouter point d'ordre</a> | 
                    <a href="#">Annuler la réunion</a> | 
                    <a href="<?= WEBROOT."ajoutparticipation/".$reunion->getId() ?>" class="card-link">Inviter des participants </a>
                <?php endif ?>
            <?php endif ?>
        </div>

        <!-- Section du formulaire d'ajout de point d'ordre -->
        <?php if ($ajouterPointDordre): ?>
            <hr>

            <?php $f = $vue->newForm("AjouterPointDordre"); ?>
            <form method="post">
                <input type="hidden" name="formid" value="<?= $f->id ?>">
                <input type="hidden" name="reunionid" value="<?= $reunion->getId() ?>">
            
                <div class="form-group">
                    <input type="text" name="titre" class="form-control" value="<?=$f->get('titre')?>" placeholder="Nouveau Point d'ordre">
                </div>

                <div class="form-group">
                    <input id="description" value="<?=$f->get('description')?>" type="hidden" name="description">
                    <trix-editor input="description" style="min-height:200px"></trix-editor>
                </div>

                <div class="form-group">
                    <select class="form-control" id="sel1" name="dossierid">
                        <option selected>Choisissez un dossier...</option>
                        <?php foreach ($dossiers as $dossier) :?>
                            <option value="<?= $dossier->getId() ?>"><?= $dossier->getNom() ?></option>
                        <?php endforeach;?>
                    </select>
                </div>

                <div class="form-group">
                    <input type="submit" name="Sauvegarder" class="btn btn-primary"><br><br>
                </div>
            </form>
        <?php endif ?>


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
                        - <a href="<?=WEBROOT.'detailsdossier/'.$dossier->getId()?>"><?= $dossier->getNom() ?></a>
                    </small>
                <?php endif ?>
                </h4>

                
                <a href="<?=WEBROOT.'detailspoints/'.$pointdordre->getId()?>">Détails</a>
                <!-- <?php if ($estcreateur): ?>
                    | <a href="<?= WEBROOT."detailsPoint/".$pointdordre->getId() ?>">Modifier</a> | <a href="#">Annuler</a>
                <?php endif ?> -->
                <hr>

                <p><?= $pointdordre->getDescription() ?></p>
            <?php endforeach ?>
        </div>
    </div>
    
    <!-- Section des invitations -->
    <div class="col-md-4">
        <h2>Participant<?= count($participants) > 1 ? "s" : ""?></h2>
        <hr>
        
        <?php $f = $vue->newForm("SupprimerParticipation"); ?>
        <form method="post" id="suppressionParticipant">
            <input type="hidden" name="formid" value="<?= $f->id ?>">
            <input type="hidden" name="reunionid" value="<?= $reunion->getId() ?>">
           
            <?php foreach ($participants as $i => $participant) : ?>
                <div>
                    <?= $i != 0 ? "<hr>" : ""?>

                    <span><?= $participant["nom"] ?></span>
                    
                    <?php if ($participant["statut"] != "Org" && $estcreateur): ?>
                        <button type="submit" name="courriel" value="<?=$participant["courriel"]?>" class="btn btn-link float-right">Annuler l'invitation</button>

                    <?php endif ?>
                    <p><?php \app\modeles\Participation::badgeStatic($participant["statut"]) ?></p>
                </div>
                
                <?php endforeach ?>
        </form>
    </div>
</div>
