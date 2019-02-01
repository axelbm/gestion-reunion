<?php

namespace app\controleurs;

class Accueil extends \core\Controleur implements \core\iAction {

	public function action(array $args) : ?\Exception {
		if (count($args) > 0)
			return new \Exception("erreur 404", 404);

		$vue = new \core\Vue("accueil");

		$vue->setJSVar("user", array("nom" => "truc", "asd" => "qweqwe"));
		$vue->setJSVar("num", 123);
		$vue->setJSVar("str", "text");

		$vue->set("truc", "idk");

		$vue->afficher();

		return null;
	}

}
