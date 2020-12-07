<?php

namespace services;

class Autoloader
{
    public $file = '.php';
    public function loadClass(string $classname) {
        $classname = str_replace ( "\\", "/", $classname);
        $filename = __DIR__ . '/../' . "{$classname}" . $this->file; 
        if (file_exists($filename)) {
            require $filename;
            return true;
            }
    return false;
        }
    }