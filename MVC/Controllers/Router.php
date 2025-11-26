<?php

namespace MVC\Controllers;

class Router
{
    public $model;
    public $ext;
    public $id;
    public function __construct($model, $ext = null, $id = null)
    {
        $this->model = $model;
        $this->ext = $ext;
        $this->id = $id;
    }

    public static function parse($path)
    {
        list($path, $ext) = explode('.', $path);
        $arr = explode('/', $ext);
        return new self($path, $arr[0], count($arr) > 1 ? $arr[1] : null);
    }
}