<pre>
<?php
include $_SERVER['DOCUMENT_ROOT'] . "/myFolder/config/main.php";
include ROOT_DIR . "/services/Autoloader.php";

use models\Product;
use models\Order;
use models\OrderProduct;
use models\User;
use models\Category;
use services\Autoloader;
use services\Db;


function __autoload($classname) {
    (new Autoloader())->loadClass($classname);
}

$controllerName = $_GET['c'] ?: 'product';
$actionName = $_GET['a'];

$controllerClass = "controllers\\" . ucfirst($controllerName) . "Controller";

if(class_exists($controllerClass)) {
    $controller = new $controllerClass;
    $controller->runAction($actionName);
}

$product = (new Product());
$product->id = 5;
//$product->delete();
$product->name = 'Save';
$product->price = 500;
$product->description = 'TEST';
$product->category_id = 2;
$product->save();


