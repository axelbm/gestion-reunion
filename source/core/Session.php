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

    static public function initSession() {
        if (!sessionEstOuverte()){
            session_start();
        }
    } 

    static public function sessionEstOuverte() : boolval {
        return isset($_SESSION);
    }

    static public function detruireSession(){
        session_destroy();
    }
}