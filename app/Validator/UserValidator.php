<?php

namespace App\Validator;

class UserValidator
{
    public static function createUserValidator(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ];
    }

    public static function createUserValidatorMessage(): array
    {
        return [
            'name.required' => '* Debe ingresar nombre del usuario',
            'email.required' => '* Debe ingresar correo electrónico',
            'email.unique' => '* El correo electrónico ingresado ya se encuentra registrado',
            'password.required' => '* Debe ingresar una contraseña',
        ];
    }
}