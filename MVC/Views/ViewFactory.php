<?php

namespace MVC\Views;

abstract class ViewFactory
{
    public static function create($type, $class, $decorator)
    {
        $class = '\\MVC\\Views\\' . ucfirst($type) . 'View';
        $obj = new $class($decorator);
        return $obj;
    }

    abstract public function render();
}