<div class="col-lg-4 offset-lg-4 bg-light rounded" id="register-box">
    <h2 class="text-center mt-2">Inviter des membres</h2>
    <h6 class="text-center mt-2">à rejoindre la réunion</h6>
    <h2 class="text-center mt-2"><?= $reunion->getDate()->format('Y-F-d H:i') ?></h2><br>

    <form action="" method="post" role="form" class="p-2" id="register-frm">
    <form action="/action_page.php">
    <?php foreach ($utilisateurs as $utilisateur) { ?>
      <input type="checkbox" name="courriel[]" value=""> <?= $utilisateur->getCourriet() ?><br>
    <?php } ?><br><br>
  <input type="submit" value="Inviter" class="btn btn-dark btn-block"> 

</div>
</form>
</div>