<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CheckEmail extends Component
{
    public $email;

    public function render()
    {
        return view('livewire.check-email');
    }

    public function updated($email)
    {
        $this->validateOnly($email, [
            'email' => 'required|min:6|max:255',
        ]);
    }
}
