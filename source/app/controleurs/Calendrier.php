<?php

namespace app\controleurs;
use \core\DAO;

class Calendrier extends \core\Controleur {
	use atraits\Utilisateur;

	public function action(array $args) : ?\Exception {
		if (count($args) > 0)
			return new \Exception("erreur 404", 404);

		$vue = $this->genererVue("calendrier");
		
		$this->verifierUtilisateur();

		if (!$this->estConnecter())
			\core\MainControleur::rediriger("connexion");

		$page = isset($args[0]) ? $args[0] : 0;
		$nombre = isset($_GET["npp"]) && is_numeric($_GET["npp"]) ? $_GET["npp"] : null;
		$reunions = array();

		if (is_numeric($page)){
			$page = intval($page);
		}else{
			return new \Exception("Parametre de recherche invalide", 404);
		}

		$reunions = DAO::Reunion()->getListeParUtilisateur(min(DAO::Reunion()->getPageParUtilisateur($this->utilisateur, $nombre)-1, $page), $this->utilisateur, $nombre);
		
		$participations = [];
		foreach ($reunions as $reunion) {
			$participations[$reunion->getId()] = DAO::Participations()->find($reunion->getId(), $this->utilisateur()->getCourriel());
		}

		$nombredepage = DAO::Reunion()->getPageParUtilisateur($this->utilisateur, $nombre-1, $page);


		$vue->set("reunions", $reunions);
		$vue->set("participations", $participations);
		$vue->set("nombredepage", $nombredepage);

		$vue->afficher();


		return null;
	}

}