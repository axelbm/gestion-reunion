<div class="col-lg-4 offset-lg-4 bg-light rounded" id="register-box">
    <h2 class="text-center mt-2">Inviter des membres</h2>
    <h6 class="text-center mt-2">à rejoindre la réunion</h6>
    <h2 class="text-center mt-2"><?= $reunion->getDate()->format('Y-F-d H:i') ?></h2><br>

    <?php $f = new \core\FormView("AjouterParticipation"); ?>
    <form action="" method="post" role="form" class="p-2" id="participation-frm">
    <div class="container1">
    <input type="hidden"  name="formid" value="<?= $f->id ?>">
    <input type="hidden"  name="reunionid" value="<?= $reunion->getId() ?>">
    <?php foreach ($utilisateurs as $utilisateur) { ?>
      <input type="checkbox" class="checkedAll" name="courriels[]" value="<?= $utilisateur->getCourriel() ?>"> <?= $utilisateur->getCourriel() ?><br>
    <?php } ?><br><br>
    </div><br>
    <input type="submit" value="Inviter" class="btn btn-dark btn-block"> 
    </form>
</div>


