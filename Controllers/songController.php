<?php

require_once 'Models/songModel.php';
require_once 'Views/songView.php';
require_once 'Helpers/userHelper.php';


class SongController {
    private $view;
    private $model;
    private $helper;

    public function __construct() {
        $this->view = new SongView();
        $this->model = new SongModel();
        $this->helper = new UserHelper();
    }


    function throwError() {
        $this->view->renderError();
    }

    function showAllElems() {
        //obtengo el arreglo desde el modelo con la funcion
        $songs = $this->model->getAllElements();

        //obtengo todos los elementos para poder mantener al select actualizado 
        $elems = $this->model->getAllElements();

        //muestro con la funcion de la vista
        $this->view->renderElements($songs, $elems);
    }

    function showSongListByBand() {
        $band = $_GET['band-select'];
        $songs = $this->model->getSongsByBand($band);
        $elems = $this->model->getAllElements();

        $this->view->renderElements($songs, $elems);
    }

    function showBandList() {
        $bands = $this->model->getBandList();
        
        //obtengo todos los elementos para poder mantener al select actualizado 
        $elems = $this->model->getAllElements();

        $this->view->renderBandList($bands, $elems);
    }

    function showSongList() {
        $songs = $this->model->getSongList();

        //obtengo todos los elementos para poder mantener al select actualizado 
        $elems = $this->model->getAllElements();

        $this->view->renderSongList($songs, $elems);
    }

    function showSongDetails($id) {
        $songs = $this->model->getSongDetails($id);
        $elems = $this->model->getAllElements();

        $this->view->renderSongDetails($songs, $elems);
    }

    function showAdminSongList() {
        $this->helper->checkLoggedIn();


        $songs = $this->model->getSongList();
        $bands = $this->model->getBandList();
        
        $this->view->renderAdminSongList($songs, $bands);
    }

    function showAdminBandList() {
        $this->helper->checkLoggedIn();


        $bands = $this->model->getBandList();

        $this->view->renderAdminBandList($bands);
    }

    function eraseSong($id) {
        $this->helper->checkLoggedIn();


        $this->model->deleteSong($id);

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    function addSong() {
        $this->helper->checkLoggedIn();


        $songName = $_POST['song-name'];
        $albumName = $_POST['album-name'];
        $songLength = $_POST['song-length'];
        $releaseDate = $_POST['song-release-date'];
        $idBand = $_POST['band-id-select'];

        $this->model->insertSong($songName, $albumName, $songLength, $releaseDate, $idBand);

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    function editSong() {
        $this->helper->checkLoggedIn();


        $id = $_POST['song-id-select'];
        $songName = $_POST['song-name'];
        $albumName = $_POST['album-name'];
        $songLength = $_POST['song-length'];
        $releaseDate = $_POST['song-release-date'];
        $idBand = $_POST['band-id-select'];

        $this->model->updateSong($songName, $albumName, $songLength, $releaseDate, $idBand, $id);

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    function eraseBand($id) {
        $this->helper->checkLoggedIn();


        $this->model->deleteBand($id);

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    function addBand() {
        $this->helper->checkLoggedIn();


        $bandName = $_POST['band-name'];
        $bandDebut = $_POST['band-debut'];
        $albumsReleased = $_POST['released-albums'];
        $bandMembers = $_POST['band-members'];

        $this->model->insertBand($bandName, $bandDebut, $albumsReleased, $bandMembers);

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    function editBand() {
        $this->helper->checkLoggedIn();

        
        $id = $_POST['band-id-select'];
        $bandName = $_POST['band-name'];
        $bandDebut = $_POST['band-debut'];
        $albumsReleased = $_POST['released-albums'];
        $bandMembers = $_POST['band-members'];

        $this->model->updateBand($bandName, $bandDebut, $albumsReleased, $bandMembers, $id);

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}