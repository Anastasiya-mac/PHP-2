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