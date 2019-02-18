<?php

namespace app\controleurs;
use \core\DAO;

class DetailsPoints extends \core\Controleur {
	use atraits\Utilisateur;

	public function action(array $args) : ?\Exception {
		if (count($args) != 1)
			return new \Exception("erreur 404", 404);

		$vue = $this->genererVue("detailsPoints");
		
		$this->verifierUtilisateur();

		if (!$this->estConnecter())
            \core\MainControleur::rediriger("connexion");
            
        $pointdordre = DAO::PointDordre()->find($args[0]);
        if (!$pointdordre) {
            return new \Exception("erreur 404", 404);
        }

        $vue->set("reunion",$pointdordre->getReunion());
        $vue->set("dossier",$pointdordre->getDossier());
        $vue->set("pointdordre",$pointdordre);

        $vue->afficher();
            
        return null;
	}

}