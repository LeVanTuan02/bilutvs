<?php

    define('VIEW_FOLDER_NAME', 'Views');
    function loadView($viewPath, $data = []) {

        foreach ($data as $key => $value) {
            $$key = $value;
        }

        $viewPath = VIEW_FOLDER_NAME . '/' . str_replace('.', '/', $viewPath) . '.php';
        require_once "$viewPath";
    }

?>