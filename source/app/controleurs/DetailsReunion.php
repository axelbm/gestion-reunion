<?php

namespace app\controleurs;
use \core\DAO;

class DetailsReunion extends \core\Controleur {
	use atraits\Utilisateur;

	public function action(array $args) : ?\Exception {
		if (count($args) < 1 || count($args) > 2)
			return new \Exception("erraaaeur 404", 404);

		$vue = $this->genererVue("detailsReunion");
		
		$this->verifierUtilisateur();

		if (!$this->estConnecter())
			\core\MainControleur::rediriger("connexion");

        $reunion = DAO::Reunion()->find($args[0]);
       	if (!$reunion) {
			return new \Exception("erreur 404", 404);
		}
		
		if (isset($args[1])) {
			switch ($args[1]) {
				case 'ajouterpointdordre':
					$dossiers = DAO::Dossier()->select();
					$vue->set("dossiers", $dossiers);
					
					break;
				
				default:
					return new \Exception("erreur 404", 404);
			}
		}
		   
       	$participations = $reunion->getParticipations();
		$pointdordres = $reunion->getPointDordres();
		
       

		$estcreateur = $reunion->estCreateur($this->utilisateur);
		
		$vue->set("ajouterPointDordre", isset($args[1]) && $args[1] == "ajouterpointdordre");
		$vue->set("reunion", $reunion);
		$vue->set("participations", $participations);
		$vue->set("pointdordres", $pointdordres);
        $vue->set("estcreateur", $estcreateur);

		$vue->afficher();


		return null;
	}

}