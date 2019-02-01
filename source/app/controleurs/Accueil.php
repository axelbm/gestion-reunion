<?php

namespace app\controleurs;

class Accueil extends \core\Controleur {

	public function action(array $args) : ?\Exception {
		if (count($args) > 0)
			return new \Exception("erreur 404", 404);

		$vue = new \core\Vue("accueil");

		$vue->afficher();

		return null;
	}

}
