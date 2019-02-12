<?php

namespace app\controleurs;

class Dossiers extends \core\Controleur {
	use atraits\Utilisateur;

	public function action(array $args) : ?\Exception {
		if (count($args) > 0)
			return new \Exception("erreur 404", 404);

		$vue = $this->genererVue("dossiers");
		
		$this->verifierUtilisateur();

		$vue->afficher();


		return null;
	}
}