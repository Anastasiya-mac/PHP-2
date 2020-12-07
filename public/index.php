<pre>
<?php

include $_SERVER['DOCUMENT_ROOT'] . "/myFolder/base/Application.php";
include $_SERVER['DOCUMENT_ROOT'] . "/myFolder/services/Autoloader.php";
include $_SERVER['DOCUMENT_ROOT'] . "/myFolder/vendor/autoload.php";

spl_autoload_register([new services\Autoloader(), 'loadClass']);


$config = include $_SERVER['DOCUMENT_ROOT'] . "/myFolder/config/main.php";

base\Application::getInstance()->run($config);