<?php

namespace app\controleurs;

class Deconnexion extends \core\Controleur {
    use atraits\Utilisateur;

	public function action(array $args) : ?\Exception {
		if (count($args) > 0)
			return new \Exception("erreur 404", 404);

		$this->verifierUtilisateur();

		if ($this->estConnecter())
            \app\outils\Session::deconnexion();
        
        \core\MainControleur::rediriger();
		return null;
	}

}
