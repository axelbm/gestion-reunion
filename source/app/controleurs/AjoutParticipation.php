<?php

namespace app\controleurs;

class AjoutParticipation extends \core\Controleur {
	use atraits\Utilisateur;

	public function action(array $args) : ?\Exception {
		if (count($args) > 1)
			return new \Exception("erreur 404", 404);

		$vue = $this->genererVue("ajoutParticipation");
		
		$this->verifierUtilisateur();

		if ($this->estConnecter() && !$this->utilisateur->estAdministrateur())
			\core\MainControleur::rediriger();


        

		$vue->afficher();


		return null;
	}

}
