<?php

namespace traits;

trait Singleton
{
    static $instance = null;

    public static function getInstance() {
        if (is_null(static::$instance)) {
            static::$instance = new static();
        }
        return static::$instance;
    }

    protected function __construct() {}
    protected function __wakeup() {}
    protected function __clone() {}
}