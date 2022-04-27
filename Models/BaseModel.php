<?php

class BaseModel extends Database {

    protected $connect;

    public function __construct() {
        $this->connect = $this->connect();
    }

    public function query($query) {
        $stmt = $this->connect->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function query_one($query) {
        $stmt = $this->connect->prepare($query);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function execute($query) {
        $stmt = $this->connect->prepare($query);
        return $stmt->execute();
    }

    public function getNumRows($query) {
        $stmt = $this->connect->prepare($query);
        $stmt->execute();
        return $stmt->rowCount();
    }
}

?>