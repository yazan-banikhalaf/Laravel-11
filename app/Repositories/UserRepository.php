<?php

namespace App\Repositories;

use App\Interfaces\UserInterface;
use App\Models\User;

class UserRepository implements UserInterface
{
    public function all()
    {
        return User::all();
    }

    public function store(array $data)
    {
       return  User::create([
            "name"=> $data['name'],
            "email"=> $data['email'],
            "password"=> $data['password']
        ]);
    }
}
