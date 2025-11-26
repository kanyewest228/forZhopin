<?php

namespace MVC\Decorators;

class UsersDecorator extends DecoratorFactory
{
    public $users;

    public function __construct($users)
    {
        $this->users = $users;
    }

    public function title()
    {
        return 'Users';
    }

    public function collection_render($call, $sep = "<br>")
    {
        return implode($sep, array_map($call, $this->users->collection));
    }
    public function body()
    {
        return $this->collection_render(function($item){
          $decorator = new UserDecorator($item);
          return $decorator->body();
        });
    }

    public function items()
    {
        return $this->collection_render(function($item){
            $decorator = new UserDecorator($item);
            return $decorator->items();
        });
    }
}