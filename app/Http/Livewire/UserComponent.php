<?php

namespace App\Http\Livewire;

use App\Actions\Users\CreateUserActions;
use App\Events\RegisterUser;
use App\Models\User;
use App\Validator\UserValidator;
use Livewire\Component;

class UserComponent extends Component
{
    public $name;
    public $email;
    public $password;
    public $user_created;
    protected $listeners = ['render' => '$refresh'];

    public function render()
    {
        return view('livewire.user-component', [
            'users' => User::paginate(10),
        ]);
    }

    public function store()
    {
        $this->validate(UserValidator::createUserValidator(), UserValidator::createUserValidatorMessage());
        $user = CreateUserActions::create($this->name, $this->email, $this->password);
        broadcast(new RegisterUser($user));
        $this->cleanForm();
    }

    public function destroy(User $user)
    {
        $user->delete();
    }

    private function cleanForm(): void
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
    }
}
