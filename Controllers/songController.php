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
        //defino cuantos resultados quiero por cada pagina
        $limit = 7;

        //cuento la cantidad de canciones cargadas en la DB
        $countSongs = $this->model->countSongs();
        $totalSongs = $countSongs->totalSongs;

        //calculo total de paginas
        $pages = ceil($totalSongs / $limit);

        //pregunto si esta definido page o no para paginars
        if (!isset($_GET['page']) || ($_GET['page'] < 1)) {
            $currentPage = 1;
        }
        else {
            $currentPage = $_GET['page'];
        }

        //hace una operacion para obtener valor para el LIMIT del model
        $startingNumber = (($currentPage - 1) * $limit);




        //obtengo los elementos con limite por pagina
        $songs = $this->model->getElementsPerPage($startingNumber, $limit);

        //obtengo todos los elementos para poder mantener al select actualizado 
        $elems = $this->model->getAllElements();

        $bandsAvailable = $this->fixRepeatedBands($elems);

        //muestro con la funcion de la vista
        $this->view->renderElements($songs, $elems, $bandsAvailable, $pages, $currentPage);
    }

    function showSongListByBand() {
        $band = $_GET['band-select'];
        $songs = $this->model->getSongsByBand($band);
        $elems = $this->model->getAllElements();

        $bandsAvailable = $this->fixRepeatedBands($elems);

        $this->view->renderElements($songs, $elems, $bandsAvailable);
    }

    function showBandList() {
        $bands = $this->model->getBandList();
        
        //obtengo todos los elementos para poder mantener al select actualizado 
        $elems = $this->model->getAllElements();

        $bandsAvailable = $this->fixRepeatedBands($elems);

        $this->view->renderBandList($bands, $elems, $bandsAvailable);
    }

    function showSongList() {
        $songs = $this->model->getSongList();

        //obtengo todos los elementos para poder mantener al select actualizado 
        $elems = $this->model->getAllElements();

        
        $bandsAvailable = $this->fixRepeatedBands($elems);

        $this->view->renderSongList($songs, $elems, $bandsAvailable);
    }

    function showSongDetails($id) {
        $songs = $this->model->getSongDetails($id);
        $elems = $this->model->getAllElements();

        $bandsAvailable = $this->fixRepeatedBands($elems);

        $this->view->renderSongDetails($songs, $elems, $bandsAvailable);
    }

    function showAdminSongList() {
        $this->helper->checkLoggedIn();
        $this->helper->checkIfAdminIsLogged();


        $songs = $this->model->getSongList();
        $bands = $this->model->getBandList();
        
        $this->view->renderAdminSongList($songs, $bands);
    }

    function showAdminBandList() {
        $this->helper->checkLoggedIn();
        $this->helper->checkIfAdminIsLogged();


        $bands = $this->model->getBandList();

        $this->view->renderAdminBandList($bands);
    }

    function eraseSong($id) {
        $this->helper->checkLoggedIn();
        $this->helper->checkIfAdminIsLogged();


        $this->model->deleteSong($id);

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    function addSong() {
        $this->helper->checkLoggedIn();
        $this->helper->checkIfAdminIsLogged();


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
        $this->helper->checkIfAdminIsLogged();


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
        $this->helper->checkIfAdminIsLogged();


        $this->model->deleteBand($id);

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    function addBand() {
        $this->helper->checkLoggedIn();
        $this->helper->checkIfAdminIsLogged();


        $bandName = $_POST['band-name'];
        $bandDebut = $_POST['band-debut'];
        $albumsReleased = $_POST['released-albums'];
        $bandMembers = $_POST['band-members'];

        $this->model->insertBand($bandName, $bandDebut, $albumsReleased, $bandMembers);

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    function editBand() {
        $this->helper->checkLoggedIn();
        $this->helper->checkIfAdminIsLogged();

        
        $id = $_POST['band-id-select'];
        $bandName = $_POST['band-name'];
        $bandDebut = $_POST['band-debut'];
        $albumsReleased = $_POST['released-albums'];
        $bandMembers = $_POST['band-members'];

        $this->model->updateBand($bandName, $bandDebut, $albumsReleased, $bandMembers, $id);

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }





    function fixRepeatedBands($elems) {
        $bands = [];

        foreach ($elems as $elem) {
            if (!in_array($elem->band_name, $bands)) {
                array_push($bands, $elem->band_name);
            }
        }

        return $bands;
    }
}