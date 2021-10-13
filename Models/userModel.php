<?php

class UserModel {
    private $db;


    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_songs;charset=utf8', 'root', '');
    }


    function insertUser($username, $password) {
        $query = $this->db->prepare('INSERT INTO user (id, username, password) VALUES (NULL, ?, ?)');

        $query->execute([$username, $password]);
    }

    function getUser($username) {
        $query = $this->db->prepare('SELECT * FROM user WHERE username = ?');

        $query->execute([$username]);


        $elements = $query->fetch(PDO::FETCH_OBJ);

        return $elements;
    }
}