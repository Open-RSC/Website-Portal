<?php

namespace App\Http\Livewire;

use App\Models\players;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use function App\Helpers\passwd_compat_hasher;

class Login extends Component
{
    public $game = '';
    public $username = '';
    public $password = '';
    public $honeyPasses = '';
    public $honeyInputs = '';

    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.Login');
    }

    protected array $rules = [
        'game' => 'required',
        'username' => 'bail|required|min:2|max:12',
        'password' => 'required|min:4|max:20',
    ];

    private function resetInputFields()
    {
        $this->password = '';
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

    public function authenticate()
    {
        $this->validate([
            'game' => 'required',
            'username' => ['bail', 'required', 'min:2', 'max:12', 'exists:' . $this->game . '.players'],
            'password' => ['required', 'min:2', 'max:20'],
        ]);

        $user = players::on($this->game)->where('username', $this->username)->first();

        $trimmed_username = trim(preg_replace('/[-_.]/', ' ', $this->username));

        $form_pass = $this->password;
        if ($user->salt) {
            // accounts with old password compatibility
            $form_pass = passwd_compat_hasher($form_pass, $user->salt);
        }

        $credentials = [
            'username' => $trimmed_username,
            'pass' => $form_pass,
        ];

        if (Auth($this->game)->attempt($credentials))
        //if ($this->username = $trimmed_username and Hash::check($form_pass, $user->pass))
        {
            $this->resetInputFields();
            session()->flash('success', 'Success');
            session()->regenerate();
        } else {
            $this->resetInputFields();
            session()->flash('error', 'The password was not correct.');
        }
    }

    public function logout(): \Illuminate\Http\RedirectResponse
    {
        Auth::logout();
        return redirect(route('Secure_Login'));
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username(): string
    {
        return 'username';
    }
}