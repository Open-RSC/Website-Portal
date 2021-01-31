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

        $trimmed_username = trim(preg_replace('/[-_.]/', ' ', $this->username));
        $user = players::on($this->game)->where('username', $trimmed_username)->first();

        $form_pass = $this->password;
        if ($user->salt) {
            // accounts with old password compatibility
            $form_pass = passwd_compat_hasher($form_pass, $user->salt);
        }

        $credentials = [
            'username' => $trimmed_username,
            'pass' => $form_pass,
        ];

        if (!$user || !Hash::check($this->password, $user->pass)) {
            throw ValidationException::withMessages([
                'password' => ['The provided credentials are incorrect'],
            ]);
        }

        //return $user->createToken($this->device_name)->plainTextToken;

        $this->resetInputFields();
        session()->flash('success', 'Success');
        //session()->regenerate();
        //return redirect()->route('Home');
    }

    public function logout(): \Illuminate\Http\RedirectResponse
    {
        Auth::logout();
        return redirect(route('Secure_Login'));
    }
}