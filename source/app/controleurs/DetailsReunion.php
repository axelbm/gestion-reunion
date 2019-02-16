<?php

namespace app\controleurs;
use \core\DAO;

class DetailsReunion extends \core\Controleur {
	use atraits\Utilisateur;

	public function action(array $args) : ?\Exception {
		if (count($args) > 1)
			return new \Exception("erreur 404", 404);

		$vue = $this->genererVue("detailsReunion");
		
		$this->verifierUtilisateur();

		if (!$this->estConnecter())
			\core\MainControleur::rediriger("connexion");

        $reunion = DAO::Reunion()->find($_GET["reunion"]);
       if (!$reunion) {
           return new \Exception("erreur 404", 404);
       }
       $participations = array();
       $pointdordres = array();
		
		$utilisateurs = [];
		foreach ($participations as $participation) {
			$utilisateurs[$participation->getId()] = $participation->getUtilisateur();
       }
       
       $dossiers = [];
		foreach ($pointdordres as $pointdordre) {
			$dossiers[$pointdordre->getId()] = $pointdordre->getDossier();
		}

		$estcreateur = $reunion->estCreateur($this->utilisateur);
		
		$vue->set("reunion", $reunion);
		$vue->set("participations", $participations);
		$vue->set("pointdordres", $pointdordres);
        $vue->set("utilisateurs", $utilisateurs);
        $vue->set("dossiers", $dossiers);
        $vue->set("estcreateur", $estcreateur);

		$vue->afficher();


		return null;
	}

}