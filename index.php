<?php
require_once(__DIR__ . '/errorHandler.php');
require_once(__DIR__ . '/autoloader.php');

$requestParser = new \app\components\RequestParser($_SERVER);
$controllerName = $requestParser->getControllerName();
$controllerClass = 'app\\controllers\\' . ucfirst($controllerName) . 'Controller';
$actionMethod = 'action' . ucfirst($requestParser->getActionName());

try {
    $controller = new $controllerClass($controllerName);
    $controller->$actionMethod();
} catch (Exception $e) {
    header('HTTP/1.0 404 Not found');
    echo '404 ;-(';
}
