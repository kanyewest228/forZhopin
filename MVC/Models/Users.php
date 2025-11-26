<?php

namespace MVC\Models;

class Users
{
    public $collection;

    public function __construct($users=null)
    {
        if(is_null($users)){
            $users = [
                new User('mail@example.com', 'password1', 'name1', 'surname1'),
                new User('mail@example.com', 'password2', 'name2', 'surname2'),
                new User('mail@example.com', 'password3', 'name3', 'surname3'),
            ];
        }
        $this->collection = $users;
    }
}