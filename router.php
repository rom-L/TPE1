<?php

require_once 'Controllers/songController.php';
require_once 'Controllers/userController.php';


// defino la base url para la construccion de links con urls semánticas
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');


if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}
else {
    $action = 'listar/all';
}


$params = explode('/', $action);

//inicializo al controlador
$songController = new SongController();
$userController = new UserController();



switch ($params[0]) {
    case 'listar': {
        //si el parametro 1 no existe tira error 404 y no se ejecuta el codigo que sigue
        if (!isset($params[1])) {
            $songController->throwError();
            return;
        }

        switch ($params[1]) {
            case 'all': {
                $songController->showAllElems();
            } break;

            case 'bands': {
                $songController->showBandList();
            } break;

            case 'songs': {
                $songController->showSongList();
            } break;
            
            case 'songsByBand': {
                $songController->showSongListByBand();
            } break;

            default: {
                $songController->throwError();
            } break;
        }
    } break;

    case 'showDetails': {
        $songController->showSongDetails($params[1]);
    } break;

    case 'user': {
        if (!isset($params[1])) {
            $songController->throwError();
            return;
        }

        switch ($params[1]) {
            case 'register': {
                $userController->showRegisterForm();
            } break;

            case 'verifyRegister': {
                $userController->register();
            } break;

            case 'login': {
                $userController->showLoginForm();
            } break;

            case 'verifyLogin': {
                $userController->login();
            } break;

            case 'logout': {
                $userController->logout();
            } break;

            default: {
                $songController->throwError();
            } break;
        }
    } break;
    
    case 'admin': {
        if (!isset($params[1])) {
            $songController->throwError();
            return;
        }

        switch ($params[1]) {
            case 'songs': {
                if (!isset($params[2])) {
                    $songController->showAdminSongList();
                    return;
                }
                

                switch ($params[2]) {
                    case 'add': {
                        $songController->addSong();
                    } break;

                    case 'edit': {
                        $songController->editSong();
                    } break;

                    case 'delete': {
                        $songController->eraseSong($params[3]);
                    } break;

                    default: {
                        $songController->throwError();
                    } break;
                }
            } break;

            case 'bands': {
                if (!isset($params[2])) {
                    $songController->showAdminBandList();
                    return;
                }


                switch ($params[2]) {
                    case 'add': {
                        $songController->addBand();
                    } break;

                    case 'edit': {
                        $songController->editBand();
                    } break;

                    case 'delete': {
                        $songController->eraseBand($params[3]);
                    } break;

                    default: {
                        $songController->throwError();
                    } break;
                }
            } break;

            default: {
                $songController->throwError();
            } break;
        }
    } break;

    default: {
        $songController->throwError();
    } break;
}