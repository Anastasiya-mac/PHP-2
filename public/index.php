<pre>
<?php

include $_SERVER['DOCUMENT_ROOT'] . "/myFolder/config/main.php";
include ROOT_DIR . "services/Autoloader.php";

spl_autoload_register([new services\Autoloader(), 'loadClass']);
include VENDOR_DIR . 'autoload.php';


$request = new base\Request();

$controllerName = $request->getControllerName() ?: 'product';
$actionName = $request->getActionName();

//$controllerName = $_GET['c'] ?: 'product';
//$actionName = $_GET['a'];

$controllerClass = "controllers\\" . ucfirst($controllerName) . "Controller";


if(class_exists($controllerClass)) {
    $renderer = new services\Render();
    $controller = new $controllerClass($renderer);
    try {
       $controller->runAction($actionName); 
    }
    catch (Exception $e) {
        (new controllers\ErrorController($renderer))->RunAction('NotFound');
    }
    
}


