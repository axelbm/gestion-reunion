<?php

namespace app\controleurs;
use \core\DAO;

class DetailsPoints extends \core\Controleur {
	use atraits\Utilisateur;

	public function action(array $args) : ?\Exception {
		if (count($args) > 0)
			return new \Exception("erreur 404", 404);

		$vue = $this->genererVue("detailsPoints");
		
		$this->verifierUtilisateur();

		if (!$this->estConnecter())
			\core\MainControleur::rediriger("connexion");

        // $dossier = DAO::Dossier()->find($_GET["dossier"]);
       	// if (!$dossier) {
        //    	return new \Exception("erreur 404", 404);
       	// }
       	// $pointdordres = array();
		
       	// $reunions = [];
		// foreach ($pointdordres as $pointdordre) {
		// 	$reunions[$pointdordre->getId()] = $pointdordre->getReunion();
		// }

		// $vue->set("reunions", $reunions);
		// $vue->set("pointdordres", $pointdordres);
        // $vue->set("dossier", $dossier);

		$vue->afficher();


		return null;
	}

}