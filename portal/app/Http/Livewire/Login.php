<?php

namespace App\Http\Livewire;

use App\Models\players;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use function App\Helpers\passwd_compat_hasher;

class Login extends Component
{
    public $game = '';
    public $username = '';
    public $pass = '';
    public $honeyPasses = '';
    public $honeyInputs = '';

    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.Login');
    }

    protected array $rules = [
        'game' => 'required',
        'username' => 'bail|required|min:2|max:12',
        'pass' => 'required|min:4|max:20',
    ];

    private function resetInputFields()
    {
        $this->pass = '';
        $this->honeyPasses = '';
        $this->honeyInputs = '';
    }

    public function updated($field)
    {
        try {
            $this->validateOnly($field);
        } catch (ValidationException $e) {
        }
    }

    public function login()
    {
        $v = $this->validate([
            'game' => 'required',
            'username' => ['bail', 'required', 'min:2', 'max:12', 'exists:' . $this->game . '.players'],
            'pass' => ['required', 'min:2', 'max:20'],
        ]);

        $user = players::on($this->game)->where('username', $this->username)->first();
        $salt = players::on($this->game)->where('salt', $this->username)->first();

        $form_pass = $this->pass;
        if ($salt) {
            // accounts with old password compatibility
            $form_pass = passwd_compat_hasher($form_pass, $salt);
        }

        if (Auth($this->game)->attempt(['username' => trim(preg_replace('/[-_.]/', ' ', $this->username)), 'pass' => bcrypt($form_pass)])) {
            //return redirect(route('Home'));
            $this->resetInputFields();
            session()->flash('success', 'Logged in successfully.');
            //session()->regenerate();
            return 'success';
        } else {
            $this->resetInputFields();
            session()->flash('error', 'The password was not correct.');
            return 'fail';
            //return redirect(back());
        }
    }

    public function logout(): \Illuminate\Http\RedirectResponse
    {
        Auth::logout();

        return redirect(route('Secure_Login'));
    }

    public function username(): string
    {
        return 'username';
    }
}