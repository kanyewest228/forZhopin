<?php

namespace MVC\Controllers;

use MVC\Decorators\DecoratorFactory;
use MVC\Views\ViewFactory;

class Controller
{
    public $path;
    public $router;
    public $model;

    public function __construct($path)
    {
        $this->path = $path;
        $this->router = Router::parse($path);
        $class = 'MVC\\Models\\'.ucfirst($this->router->model);
        $this->model = new $class();
        if($this->router->id)
        {
            $this->model = $this->model->collection[$this->router->id];
        }
    }

    public function render()
    {
        $class = get_class($this->model);
        $class = substr($class, strrpos($class, '\\') + 1);
        $decorator = DecoratorFactory::create(
            $this->router->ext,
            $class,
            $this->model
        );
        $view = ViewFactory::create(
            $this->router->ext,
            $class,
            $decorator
        );
        return $view->render();
    }
}