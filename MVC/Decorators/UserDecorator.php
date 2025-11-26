<?php

namespace MVC\Decorators;

class UserDecorator extends DecoratorFactory
{
    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function title()
    {
        return implode(' ', [$this->user->first_name, $this->user->last_name]);
    }

    public function body()
    {
        return "<h2>".htmlspecialchars($this->title())."</h2><p>".htmlspecialchars($this->user->email)."</p>";
    }

    public function items()
    {
        return '<item>'.
            '<title>'.htmlspecialchars($this->title()).'</title>'.
            '<p>'.htmlspecialchars($this->user->email).'</p>'.
            '</item>';
    }
}