<?php

namespace core;

class Session {
    
    static public function getFormAction(string $formId) : string {
        return "";
    }

    static public function ajouterFormAction(string $formId, string $formAction) {
        
    }

    static public function viderFormAction() {

    }

    static public function initialiser() {
        if (!self::estOuverte()){
            session_start();
        }
    } 

    static public function estOuverte() : boolval {
        return isset($_SESSION);
    }

    static public function detruire(){
        session_destroy();
    }
}