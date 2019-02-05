<?php

namespace core;

class Session {
    
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