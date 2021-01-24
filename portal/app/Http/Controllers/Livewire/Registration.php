<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Throwable;

class Registration extends Component
{
    public $email = '';
    public $password = '';
    public $passwordConfirmation = '';

    protected $rules = [
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|same:passwordConfirmation',
    ];

    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function save()
    {
        $attr = $this->validate();

        try {
            User::create([
                'name' => $attr['email'],
                'email' => $attr['email'],
                'password' => Hash::make($attr['password']),
            ]);

            $this->dispatchBrowserEvent('notify', 'Registration Success');
            $this->reset();

            // Or redirect with return redirect()->route('something');

        } catch (Throwable $e) {
            $this->dispatchBrowserEvent('notify', $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.registration');
    }
}