<?php

class LoginModel extends BaseModel {
    public function sendData($user) {
        $_SESSION['user'] = $user;
    }

    public function checkUserLogin() {
        if(isset($_SESSION['user'])) {
            $user = $_SESSION['user'];

            $query = "SELECT * FROM users WHERE username = '$user[username]' AND password = '$user[password]'";
            if($this->getNumRows($query)) {
                return $this->query_one($query);
            }
        }

        return false;
    }
}

?>