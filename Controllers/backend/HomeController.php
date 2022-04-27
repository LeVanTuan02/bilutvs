<?php

class HomeController extends BaseController {
    private $dataUser;

    public function __construct() {
        $this->dataUser = parent::checkLogin();
    }


    public function index() {
        $this->loadView('partitions.backend.header', [
            'data_user' => $this->dataUser
        ]);
        $this->loadView('partitions.backend.sidebar', [
            'data_user' => $this->dataUser
        ]);
        $this->loadView('backend.home.index');
        $this->loadView('partitions.backend.footer', [
            'data_user' => $this->dataUser
        ]);
    }
}

?>