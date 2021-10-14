<?php

require_once 'library/smarty-3.1.39/libs/Smarty.class.php';

class SongView {
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty();
    }


    function renderError() {
        //muestra default (error 404)
        $this->smarty->display('templates/error.tpl');
    }

    function renderElements($songs, $elems, $bandsAvailable) {
        //asigno variable songs a archivo smarty
        $this->smarty->assign('songs', $songs);

        //asigna los valores a otra variable llamada bandsAvailable para poder trabajar con el select
        $this->smarty->assign('bandsAvailable', $bandsAvailable);

        $this->smarty->assign('elems', $elems);

        //muestra lista de canciones
        $this->smarty->display('templates/allElementsList.tpl');
    }

    function renderBandList($bands, $elems, $bandsAvailable) {
        $this->smarty->assign('bands', $bands);
        $this->smarty->assign('elems', $elems);
        $this->smarty->assign('bandsAvailable', $bandsAvailable);

        $this->smarty->display('templates/bandListPublic.tpl');
    }

    function renderSongList($songs, $elems, $bandsAvailable) {
        $this->smarty->assign('songs', $songs);
        $this->smarty->assign('elems', $elems);
        $this->smarty->assign('bandsAvailable', $bandsAvailable);

        $this->smarty->display('templates/songListPublic.tpl');
    }

    function renderSongDetails($songs, $elems) {
        $this->smarty->assign('songs', $songs);
        $this->smarty->assign('elems', $elems);

        $this->smarty->display('templates/songDetails.tpl');
    }

    function renderAdminSongList($songs, $bands) {
        $this->smarty->assign('bands', $bands);
        $this->smarty->assign('songs', $songs);

        $this->smarty->display('templates/songListAdmin.tpl');
    }

    function renderAdminBandList($bands) {
        $this->smarty->assign('bands', $bands);

        $this->smarty->display('templates/bandListAdmin.tpl');
    }
}