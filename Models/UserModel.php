<?php

class UserModel extends BaseModel {
    public function checkUsernameExists($username) {
        $query = "SELECT username FROM users WHERE username = '${username}'";
        return $this->getNumRows($query);
    }

    public function getUser($username) {
        $query = "SELECT * FROM users WHERE username = '${username}'";
        return $this->query_one($query);
    }
}

?>