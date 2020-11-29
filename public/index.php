<pre>
<?php

include $_SERVER['DOCUMENT_ROOT'] . "/myFolder/config/main.php";
include ROOT_DIR . "services/Autoloader.php";

spl_autoload_register([new services\Autoloader(), 'loadClass']);
include VENDOR_DIR . 'autoload.php';

$controllerName = $_GET['c'] ?: 'product';
$actionName = $_GET['a'];

$controllerClass = "controllers\\" . ucfirst($controllerName) . "Controller";

if(class_exists($controllerClass)) {
    
    $controller = new $controllerClass(new services\Render());
    $controller->runAction($actionName);
}


