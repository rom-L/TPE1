<?php

class UserHelper {

    public function __construct() {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }


    function checkLoggedIn() {
        if (empty($_SESSION['USER_ID'])) {
            header("Location: " . BASE_URL . "user/login");
            die();
        }
    }

    function ifLoggedInRedirect() {
        if (!empty($_SESSION['USER_ID'])) {
            header("Location: " . BASE_URL);
            die();
        }
    }

    function logout() {
        session_destroy();

        header("Location: " . BASE_URL);
    }
}