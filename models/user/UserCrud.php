<?php

class UserCrud {

    private $pdoCrud;

    public function __construct() {
        $this->pdoCrud = new PDOCrud();
    }

    public function registerUser($name, $email, $password, $phone) {
        $pdo = array(
            ":name" => $name,
            ":email" => $email,
            ":password" => $password,
            ":phone" => $phone
        );

        $columns = "name, email, password, phone";
        $values = ":name, :email, :password, :phone";

        return $this->pdoCrud->insert("usuarios", $columns, $values, $pdo);
    }

}