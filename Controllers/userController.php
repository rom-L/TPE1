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


        $this->view->renderRegisterForm();
    }

    function register() {
        if ((!empty($_POST['username'])) && (!empty($_POST['password']))) {
            $username = $_POST['username'];
            //hasheo a la contraseña (encripto)
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

            $this->model->insertUser($username, $password);

            $this->view->renderRegisterForm('Registro exitoso!');
        }
        else {
            $this->view->renderRegisterForm('Registro fallido');
        }
    }

    function showLoginForm() {
        $this->view->renderLoginForm();
    }

    function login() {
        if ((!empty($_POST['username'])) && (!empty($_POST['password']))) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = $this->model->getUser($username);


            if ($user && password_verify($password, $user->password)) {
                session_start();

                $_SESSION['USER_ID'] = $user->id;
                $_SESSION['USER_NAME'] = $user->username;

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

    function logout() {
        $this->helper->logout();
    }
}