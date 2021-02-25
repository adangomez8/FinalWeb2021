<?php

class AuthHelper {

    static public function checkLogged() {
        if(session_status() != PHP_SESSION_ACTIVE){
        session_start();
        }

        if (!isset($_SESSION['logged']) || ($_SESSION['admin']!=1)) {//Suponiendo una tabla Usuarios($id, $user, $password, $admin); donde "admin" indique si es administrador o no.
            header('Location: ' . BASE_URL);
            die();
        }
    }
}