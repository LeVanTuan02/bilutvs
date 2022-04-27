<?php

class BaseController {
    const VIEW_FOLDER_NAME = "Views";
    const MODEL_FOLDER_NAME = "Models";

    private $maintenanceModel;
    private $loginModel;

    protected function loadView($viewPath, $data = []) {

        foreach ($data as $key => $value) {
            $$key = $value;
        }

        $viewPath = self::VIEW_FOLDER_NAME . '/' . str_replace('.', '/', $viewPath) . '.php';
        require_once "$viewPath";
    }

    protected function loadModel($modelPath) {
        $modelPath = self::MODEL_FOLDER_NAME . '/' . str_replace('.', '/', $modelPath) . '.php';
        require_once "$modelPath";
    }

    protected function checkClose() {
        $this->loadModel('MaintenanceModel');
        $this->maintenanceModel = new MaintenanceModel();

        if ($this->maintenanceModel->isWebsiteClosed()) {
            header('Location: ' . DOMAIN . '/bao-tri');
        }
    }

    protected function checkLogin() {
        $this->loadModel('LoginModel');
        $this->loginModel = new LoginModel();
        if($this->loginModel->checkUserLogin()) {
            return $this->loginModel->checkUserLogin();
        }else{
            header('Location: ' . DOMAIN . '/?module=backend&controller=login');
        }
    }
}

?>