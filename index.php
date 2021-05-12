<?php
session_start();
require_once 'config/parameters.php';
require_once 'autoload.php';
require_once 'config/connection.php';
require_once 'config/cors.php';
if(isset($_GET['controller'])){
    $controllerName = $_GET['controller'] . 'Controller';
    if (class_exists($controllerName)) {
        $controller = new $controllerName();
        if (isset($_GET['action']) && method_exists($controller, $_GET['action'])) {
            $action = $_GET['action'];
            $controller->$action();
        } elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
            $default = defaultAction;
            $controller->$default();
        } else {
            echo "Method doesn't exists {$_GET['action']}";
        }
    } else {
        echo "Class doesn't exists {$controllerName}";
    }
} else {
    require_once 'src/views/Home.php';
}
