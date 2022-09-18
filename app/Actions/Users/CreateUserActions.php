<?php

namespace App\Actions\Users;

use App\Models\User;

class CreateUserActions
{
    public static function create(String $name, String $email, String $password): User
    {
       return User::create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ]);
    }
}
