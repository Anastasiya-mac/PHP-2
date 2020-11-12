<?php
include $_SERVER['DOCUMENT_ROOT'] . "/myFolder/services/Autoloader.php";
use models\Product;
use services\Autoloader;


function __autoload($classname) {
    (new Autoloader())->loadClass($classname);
}
$product = new Product();
var_dump($product);
