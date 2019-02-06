<?php

namespace app\controleurs;

use \app\outils\Session;

class Accueil extends \core\Controleur {
	use atrait\Utilisateur;

	public function action(array $args) : ?\Exception {
		if (count($args) > 0)
			return new \Exception("erreur 404", 404);

		$vue = $this->genererVue("accueil");
			
		$this->verifierUtilisateur();

		$vue->afficher();

		return null;
	}
}
