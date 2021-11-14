<?php

require_once 'Models/userModel.php';
require_once 'Views/userView.php';
require_once 'Helpers/userHelper.php';


class UserController {
    private $view;
    private $model;
    private $helper;

    public function __construct() {
        $this->view = new UserView();
        $this->model = new UserModel();
        $this->helper = new UserHelper();
    }


    function showRegisterForm() {
        //si el usuario está logeado no permite registrarse y se redirecciona
        $this->helper->ifLoggedInRedirect();

        $this->view->renderRegisterForm();
    }

    function register() {
        //si el usuario está logeado no permite registrarse y se redirecciona
        $this->helper->ifLoggedInRedirect();

        if ((!empty($_POST['username'])) && (!empty($_POST['password']))) {
            $username = $_POST['username'];
            //hasheo a la contraseña (encripto)
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

            $user = $this->model->getUser($username);

            if (empty($user)) {
                $this->model->insertUser($username, $password);
                
                $this->loginAfterRegister($username);
            }
            else {
                $this->view->renderRegisterform('Este nombre de usuario ya existe!');
            }
        }
        else {
            $this->view->renderRegisterForm('Registro fallido');
        }
    }

    function showLoginForm() {
        //si el usuario esta logeado no permite logearse
        $this->helper->ifLoggedInRedirect();

        $this->view->renderLoginForm();
    }

    function login() {
        //si el usuario esta logeado no permite logearse
        $this->helper->ifLoggedInRedirect();

        if ((!empty($_POST['username'])) && (!empty($_POST['password']))) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = $this->model->getUser($username);


            if ($user && password_verify($password, $user->password)) {
                session_start();

                $_SESSION['USER_ID'] = $user->id;
                $_SESSION['USER_NAME'] = $user->username;
                $_SESSION['USER_PERMISSION'] = $user->permission;

                header("Location: " . BASE_URL);
            }
            else {
                $this->view->renderLoginForm('Nombre de usuario o contraseña incorrectos');
            }
        }
        else {
            $this->view->renderLoginForm('Completar casillas');
        }
    }

    function loginAfterRegister($username) {
        $user = $this->model->getUser($username);

        if ($user) {
            session_start();

            $_SESSION['USER_ID'] = $user->id;
            $_SESSION['USER_NAME'] = $user->username;
            $_SESSION['USER_PERMISSION'] = $user->permission;

            header("Location: " . BASE_URL);
        }
        else {
            $this->view->renderLoginForm('Algo salió mal, vuelva a iniciar sesión');
        }
    }

    function showUserList() {
        $this->helper->checkLoggedIn();
        $this->helper->checkIfAdminIsLogged();


        $users = $this->model->getUsers();

        $this->view->renderUserList($users);
    }

    function logout() {
        $this->helper->logout();
    }
}