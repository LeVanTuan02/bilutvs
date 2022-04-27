<?php

    session_start();
    ob_start();
    require_once 'Core/init.php';
    require_once 'Helper/LoadHelper.php';
    require_once 'Helper/StringHelper.php';
    require_once 'Core/Database.php';
    require_once 'Models/BaseModel.php';
    require_once 'Controllers/BaseController.php';

    $moduleName = $_REQUEST['module'] ?? 'frontend';
    $controllerName = ucfirst(strtolower($_REQUEST['controller'] ?? 'Home')) . 'Controller';
    $actionName = $_REQUEST['action'] ?? 'index';

    if($moduleName === 'backend') {
        require_once "Controllers/backend/${controllerName}.php";
    }else {
        require_once "Controllers/frontend/${controllerName}.php";
    }

    $controllerObject = new $controllerName;
    $controllerObject->$actionName();

    ob_flush();
?>