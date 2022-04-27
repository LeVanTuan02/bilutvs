<?php

class Database {
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $dbname = 'bilutv';

    public function connect() {
        try {
            $opt = array(
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );
            return new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password, $opt);
        }

        catch (PDOException $e) {
            echo 'Kết nối thất bại' . $e->getMessage();
        }
    }
}

?>