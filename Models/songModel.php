<?php

class SongModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_songs;charset=utf8', 'root', '');
    }


    function getAllElements() {
        //preparo la query para obtener a todos los elementos de las 2 tablas
        $query = $this->db->prepare('SELECT a.id, a.song_name, a.album_name, a.song_length, a.song_release_date, b.band_name, b.debut, b.band_members, b.albums_released FROM song a INNER JOIN band b ON a.id_band_fk = b.id');

        //ejecuto la query
        $query->execute(); 
        
        //obtengo un arreglo con todos los elementos
        $elements = $query->fetchAll(PDO::FETCH_OBJ);

        return $elements;
    }

    function getSongsByBand($band) {
        $query = $this->db->prepare('SELECT a.id, a.song_name, a.album_name, a.song_length, a.song_release_date, b.band_name, b.debut, b.band_members, b.albums_released FROM song a INNER JOIN band b ON a.id_band_fk = b.id WHERE band_name = ?');

        $query->execute([$band]);


        $elements = $query->fetchAll(PDO::FETCH_OBJ);

        return $elements;
    }

    function getBandList() {
        $query = $this->db->prepare('SELECT * FROM band');

        $query->execute();


        $elements = $query->fetchAll(PDO::FETCH_OBJ);

        return $elements;
    }

    function getSongList() {
        $query = $this->db->prepare('SELECT * FROM song');

        $query->execute();


        $elements = $query->fetchAll(PDO::FETCH_OBJ);

        return $elements;
    }

    function getSongDetails($id) {
        $query = $this->db->prepare('SELECT * FROM song WHERE id = ?');

        $query->execute([$id]);


        $elements = $query->fetchAll(PDO::FETCH_OBJ);

        return $elements;
    }

    function insertSong($songName, $albumName, $songLength, $releaseDate, $idBand) {
        $query = $this->db->prepare('INSERT INTO song (id, song_name, album_name, song_length, song_release_date, id_band_fk) VALUES (NULL, ?, ?, ?, ?, ?)');

        $query->execute([$songName, $albumName, $songLength, $releaseDate, $idBand]);
    }

    function updateSong($songName, $albumName, $songLength, $releaseDate, $idBand, $id) {
        $query = $this->db->prepare('UPDATE song SET song_name = ?, album_name = ?, song_length = ?, song_release_date = ?, id_band_fk = ? WHERE song.id = ?');

        $query->execute([$songName, $albumName, $songLength, $releaseDate, $idBand, $id]);
    }

    function deleteSong($id) {
        $query = $this->db->prepare('DELETE FROM song WHERE id = ?');

        $query->execute([$id]);
    }

    function insertBand($bandName, $bandDebut, $albumsReleased, $bandMembers) {
        $query = $this->db->prepare('INSERT INTO band (id, band_name, debut, albums_released, band_members) VALUES (NULL, ?, ?, ?, ?)');

        $query->execute([$bandName, $bandDebut, $albumsReleased, $bandMembers]);
    }

    function updateBand($bandName, $bandDebut, $albumsReleased, $bandMembers, $id) {
        $query = $this->db->prepare('UPDATE band SET band_name = ?, debut = ?, albums_released = ?, band_members = ? WHERE band.id = ?');

        $query->execute([$bandName, $bandDebut, $albumsReleased, $bandMembers, $id]);
    }

    function deleteBand($id) {
        $query = $this->db->prepare('DELETE FROM band WHERE id = ?');

        $query->execute([$id]);
    }


    /**
     * COMMENTS
    */

                                                        

    function getAllComments() {
        //$query = $this->db->prepare('SELECT a.id, b.song_name, c.username, a.comment, a.score FROM comment a INNER JOIN song b ON a.id_song_fk = b.id INNER JOIN user c ON a.id_user_fk = c.id');
        $query = $this->db->prepare('SELECT a.id, a.id_song_fk, b.username, a.comment, a.score FROM comment a INNER JOIN user b ON a.id_user_fk = b.id');

        $query->execute();


        $elements = $query->fetchAll(PDO::FETCH_OBJ);

        return $elements;
    }

    function getAllCommentsBySongID($id) {
        $query = $this->db->prepare('SELECT a.id, a.id_song_fk, b.username, a.comment, a.score FROM comment a INNER JOIN user b ON a.id_user_fk = b.id WHERE comment.id_song_fk = ?');

        $query->execute([$id]);

        
        $elements = $query->fetchAll(PDO::FETCH_OBJ);

        return $elements;
    }

    function getCommentByID($id) {
        $query = $this->db->prepare('SELECT a.id, a.id_song_fk, b.username, a.comment, a.score FROM comment a INNER JOIN user b ON a.id_user_fk = b.id WHERE comment.id = ?');

        $query->execute([$id]);


        $elements = $query->fetch(PDO::FETCH_OBJ);

        return $elements;
    }

    function deleteComment($id) {
        $query = $this->db->prepare('DELETE FROM comment WHERE id = ?');

        $query->execute([$id]);
    }

    function postComment($song, $user, $commentText, $score) {
        $query = $this->db->prepare('INSERT INTO comment (id, id_song_fk, id_user_fk, comment, score) VALUES (NULL, ?, ?, ?, ?)');

        $query->execute([$song, $user, $commentText, $score]);

        return $this->db->lastInsertId();
    }
}