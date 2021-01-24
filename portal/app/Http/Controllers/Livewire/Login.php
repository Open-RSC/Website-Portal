<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email = '';
    public $password = '';

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required'
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function login()
    {
        $attr = $this->validate();

        if (Auth::attempt($attr)) {
            return redirect()->route('home');
        }

        $this->dispatchBrowserEvent('notify', 'Login Failed');
        $this->reset(['password']);
    }

    public function render()
    {
        return view('livewire.login');
    }
}