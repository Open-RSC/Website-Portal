<?php

namespace App\Http\Livewire;

use App\Models\players;
use Illuminate\Support\Facades\Auth as Auth;
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
        return view('livewire.login');
    }

    protected array $rules = [
        'game' => 'required',
        'username' => ['required', 'max:12'],
        'password' => ['required', 'max:20'],
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

    public function loginStore(): \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $v = $this->validate([
            'game' => 'required',
            'username' => ['required', 'max:12'],
            'password' => ['required', 'max:20'],
        ]);

        $data = [
            'username' => trim(preg_replace('/[-_.]/', ' ', $this->username)),
            'pass' => bcrypt($this->password),
        ];

        $user = players::on($this->game)->where('username', $this->username)->first();

        if (!$user) {
            session()->flash('message', 'Invalid credentials');
            //return redirect(back());
        }

        $form_pass = $this->password;
        if ($user->salt) {
            // accounts with old password compatibility
            $form_pass = passwd_compat_hasher($form_pass, $user->salt);
        }

        if (auth()->attempt(['username' => $this->username, 'password' => $form_pass])) {
            //return redirect(route('Home'));
            session()->flash('message', 'Success');
        } else {
            session()->flash('message', 'Invalid credentials');
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