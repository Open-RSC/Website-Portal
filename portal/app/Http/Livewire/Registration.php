<?php

namespace App\Http\Livewire;

use App\Models\curstats;
use App\Models\experience;
use App\Models\players;
use Livewire\Component;
use Throwable;

class Registration extends Component
{
    public $username = '';
    public $email = '';
    public $password = '';
    public $passwordConfirmation = '';

    public function render()
    {
        return view('livewire.Registration');
    }

    protected $rules = [
        'username' => 'required|min:3|max:12|unique:cabbage.players',
        'email' => 'required|email',
        'password' => 'required|min:4|max:20|same:passwordConfirmation',
    ];

    private function resetInputFields()
    {
        $this->username = '';
        $this->email = '';
        $this->password = '';
        $this->passwordConfirmation = '';
    }

    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function registerStore()
    {
        $v = $this->validate([
            'username' => 'required|min:3|max:12|unique:cabbage.players',
            'email' => 'required|email',
            'password' => 'required|min:4|max:20|same:passwordConfirmation',
        ]);

        $data = [
            'username' => trim($this->username),
            'email' => strtolower($this->email),
            'pass' => bcrypt($this->password),
        ];

        players::create($data);

        $user = players::where('username', $this->username)->first();

        curstats::create([
            'playerID' => $user->id,
            'hits' => 10
        ]);

        experience::create([
            'playerID' => $user->id,
            'hits' => 4000
        ]);

        session()->flash('message', 'You have been successfully registered.');
        $this->resetInputFields();
    }
}