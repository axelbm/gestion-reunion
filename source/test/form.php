<form action="" method="post">
  <input type="hidden" name="formid" value="<?= \core\MainForm::nouveauFormId("Connexion") ?>">
  First name:<br>
  <input type="text" name="firstname" value="Mickey">
  <br>
  Last name:<br>
  <input type="text" name="lastname" value="Mouse">
  <br><br>
  <input type="submit" value="Submit">
</form> 

<?php

var_dump($_POST);

new \app\forms\Connexion();