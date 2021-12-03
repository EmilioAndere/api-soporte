<?php

class Auth {

    public static function isLogged() {
        if(array_key_exists('token', $_SESSION) || $_GET['action'] == 'auth'){
            return true;
        }
        return false;
    }

}