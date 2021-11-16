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

    function getUserByName($username) {
        $query = $this->db->prepare('SELECT * FROM user WHERE username = ?');

        $query->execute([$username]);


        $elements = $query->fetch(PDO::FETCH_OBJ);

        return $elements;
    }

    function getUserByID($id) {
        $query = $this->db->prepare('SELECT * FROM user WHERE id = ?');

        $query->execute([$id]);

        
        $elements = $query->fetch(PDO::FETCH_OBJ);

        return $elements;
    }

    function getUsers() {
        $query = $this->db->prepare('SELECT * FROM user');

        $query->execute();


        $elements = $query->fetchAll(PDO::FETCH_OBJ);

        return $elements;
    }

    function deleteUser($id) {
        $query = $this->db->prepare('DELETE FROM user WHERE id=?');

        $query->execute([$id]);
    }

    function makeAdmin($id) {
        $query = $this->db->prepare('UPDATE user SET permission = 1 WHERE user.id = ?');

        $query->execute([$id]);
    }

    function removeAdmin($id) {         // ARREGLAR
        $query = $this->db->prepare('UPDATE user SET permission = 0 WHERE user.id = ?');

        $query->execute([$id]);
    }
}