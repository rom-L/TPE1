<?php

require_once 'library/smarty-3.1.39/libs/Smarty.class.php';

class UserView {
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty();
    }


    function renderRegisterform($warning = null) {
        $this->smarty->assign('warning', $warning);

        $this->smarty->display('templates/registerForm.tpl');
    }

    function renderLoginForm($warning = null) {
        $this->smarty->assign('warning', $warning);

        $this->smarty->display('templates/loginForm.tpl');
    }
}