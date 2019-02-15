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

		if (isset($_GET["dossier"])) {
			$dossier = DAO::Dossier()->find($_GET["dossier"]);
			if (!$dossier){
				return new \Exception("Parametre de recherche invalide", 404);
			}
			$reunions = DAO::Reunion()->getListeParDossier(min(DAO::Reunion()->getPageParDossier($dossier, $nombre)-1, $page), $dossier, $nombre);
		}elseif(isset($_GET["date"])){
			$reunions = DAO::Reunion()->getListeParDate(min(DAO::Reunion()->getPageParDate($_GET["date"], $nombre)-1, $page), $_GET["date"], $nombre);
		}else{
			$reunions = DAO::Reunion()->getListe(min(DAO::Reunion()->getPage()-1, $page), $nombre);
		}
			

		$vue->set("reunions", $reunions);
	

		$vue->afficher();


		return null;
	}

}