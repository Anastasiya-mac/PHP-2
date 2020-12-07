<?php

namespace base;

class ComponentsFactory
{
    public function createComponent($name, $params = []) {
        $class = $params['class'];
        if (class_exists($class)) {
            unset($params['class']);
            $reflection = new \ReflectionClass($class);
            return $reflection->newInstanceArgs($params);
        }
        ;throw new \Exception("Класс не найден");  
    }
}
    