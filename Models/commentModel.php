<?php

class CommentModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_songs;charset=utf8', 'root', '');
    }

                                                        

    function getAllComments($id) {
        $query = $this->db->prepare('SELECT a.id, a.id_song_fk, b.username, a.comment, a.score FROM comment a INNER JOIN user b ON a.id_user_fk = b.id WHERE id_song_fk = ?');

        $query->execute([$id]);


        $elements = $query->fetchAll(PDO::FETCH_OBJ);

        return $elements;
    }

    function orderComments($id, $order) {
        $query = $this->db->prepare('SELECT a.id, a.id_song_fk, b.username, a.comment, a.score FROM comment a INNER JOIN user b ON a.id_user_fk = b.id WHERE id_song_fk = ? ORDER BY 5 ' . $order);

        $query->execute([$id]);


        $elements = $query->fetchAll(PDO::FETCH_OBJ);

        return $elements;
    }

    function getCommentByID($id) {
        $query = $this->db->prepare('SELECT a.id, a.id_song_fk, b.username, a.comment, a.score FROM comment a INNER JOIN user b ON a.id_user_fk = b.id WHERE a.id = ?');

        $query->execute([$id]);


        $elements = $query->fetch(PDO::FETCH_OBJ);

        return $elements;
    }

    function deleteComment($id) {
        $query = $this->db->prepare('DELETE FROM comment WHERE id = ?');

        $query->execute([$id]);
    }

    function postComment($song, $user, $comment, $score) {
        $query = $this->db->prepare('INSERT INTO comment (id, id_song_fk, id_user_fk, comment, score) VALUES (NULL, ?, ?, ?, ?)');

        $query->execute([$song, $user, $comment, $score]);

        return $this->db->lastInsertId();
    }
}