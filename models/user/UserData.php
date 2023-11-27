<?php

class UserData {

    private $pdoQuery;

    public function __construct() {
        $this->pdoQuery = new PDOQuery();
    }

    public function getUserByEmail($email)
    {
        return $this->pdoQuery->fetch("SELECT * FROM usuarios WHERE email = :email", array(
            ':email' => $email
        ));
    }

    public function getById($userId)
    {
        return $this->pdoQuery->fetch("SELECT * FROM usuarios WHERE id = :id", array(
            ':id' => $userId
        ));
    }

    public function getAllUsers()
    {
        return $this->pdoQuery->fetchAll("SELECT id, name, phone FROM usuarios");
    }
}