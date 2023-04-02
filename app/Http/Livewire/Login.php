<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $form = [
        'email' => '','password' => ''
    ];

    protected $rules = [
        'form.email' => 'required|email',
        'form.password' => 'required|min:6',
    ];

    public function render()
    {
        return view('livewire.login');
    }

    public function loginUser(){
        $this->validate();
        Auth::attempt($this->form);
        return redirect()->route('home');
    }
}
