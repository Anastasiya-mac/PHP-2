<?php

namespace services;

class Autoloader
{
    public function loadClass(string $classname) {
        $classname = str_replace ( "\\", "/", $classname);
        $filename = $_SERVER['DOCUMENT_ROOT'] . "/myFolder/{$classname}.php";
        if (file_exists($filename)) {
            require $filename;
            return true;
            }
    return false;
        }
    }