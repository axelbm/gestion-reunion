<?php

$form = core\MainForm::getInstance();


if ($form) {
	var_dump($form);
	var_dump($form->succes());
};

?>

<form action="" method="post">
	<input type="hidden" name="formid" value="<?= \core\MainForm::nouveauFormId("Connexion") ?>">
	First name:<br>
	<input type="text" name="courriel" value="">
	<br>
	Last name:<br>
	<input type="text" name="motDePasse" value="">
	<br><br>
	<input type="submit" value="Submit">
</form> 



