<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class Register extends Component
{
    public $userRegister = [
        'name' => '', 'email' => '','password'=>'','password_confirmation'=>''
    ];

    protected $rules = [
        'userRegister.name' => 'required|string',
        'userRegister.email' => 'required|email|unique:users,email',
        'userRegister.password' => 'required|string|min:6|confirmed'
    ];

    public function updated($request){
        $this->validateOnly($request);
    }

    public function render()
    {
        return view('livewire.register')
                ->layout('layouts.app')->slot('register');
    }

    public function addUser(){
        $this->validate();
        $user = User::create($this->userRegister);
        return redirect()->route('home');
    }
}
