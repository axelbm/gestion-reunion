<?php

namespace app\controleurs;

use \app\outils\Session;

class Accueil extends \core\Controleur {

	public function action(array $args) : ?\Exception {
		if (count($args) > 0)
			return new \Exception("erreur 404", 404);

		// tout est cool
		
		$vue = new \core\Vue("accueil");

		$vue->afficher();

		$user = Session::getUtilisateur();

		return null;
	}

}
