<?php

namespace App\Http\Livewire;

use App\Actions\Users\CreateUserActions;
use App\Models\User;
use App\Validator\UserValidator;
use Livewire\Component;

class UserComponent extends Component
{
    public $name;
    public $email;
    public $password;

    public function render()
    {
        return view('livewire.user-component', [
            'users' => User::paginate(10),
        ]);
    }

    public function store()
    {
        $this->validate(UserValidator::createUserValidator(), UserValidator::createUserValidatorMessage());

        CreateUserActions::create($this->name, $this->email, $this->password);
    }
}
