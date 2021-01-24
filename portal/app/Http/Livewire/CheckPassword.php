<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CheckPassword extends Component
{
    public $password;

    public function render()
    {
        return view('livewire.check-password');
    }

    protected array $rules = [
        'password' => 'required|min:4|max:20',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'password' => 'required|min:4|max:20',
        ]);
    }
}
