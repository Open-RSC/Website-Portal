<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\Validation\Validator;
use Livewire\Component;

class CheckUsername extends Component
{
    public $username;

    public function render()
    {
        return view('livewire.check-username');
    }

    public function updated($username)
    {
        $this->validateOnly($username, [
            'username' => 'required|min:3|max:12|unique:cabbage.players',
        ]);
    }
}
