<?php

namespace App\Http\Livewire;

use App\Models\cabbage;
use App\Models\players;
use App\Models\preservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use function App\Helpers\passwd_compat_hasher;

class Login extends Component
{
    public string $game = '';
    public string $username = '';
    public string $password = '';
    public string $honeyPasses = '';
    public string $honeyInputs = '';

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

    public function authenticate(): \Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $this->validate([
            'game' => 'required',
            'username' => ['required', 'min:2', 'max:12', 'exists:' . $this->game . '.players'],
            'password' => ['required', 'min:2', 'max:20'],
        ]);

        $trimmed_username = trim(preg_replace('/[-_.]/', ' ', $this->username));

        $user = players::on($this->game)->where('username', $trimmed_username)->first();

        if ($user->salt) {
            // accounts with old password compatibility
            $trimmed_pass = passwd_compat_hasher(trim($this->password), $user->salt);
        } else {
            $trimmed_pass = trim($this->password);
        }

        if ($this->game == 'cabbage') {
            if (Auth::guard('cabbage')->attempt(['username' => $trimmed_username, 'password' => $trimmed_pass])) {
                session()->regenerate();
                return redirect(route('Home'));
            } else {
                session()->flash('error', 'Invalid credentials');
            }
        } elseif ($this->game == 'preservation') {
            if (Auth::guard('preservation')->attempt(['username' => $trimmed_username, 'password' => $trimmed_pass])) {
                session()->regenerate();
                return redirect(route('Home'));
            } else {
                session()->flash('error', 'Invalid credentials');
            }
        } elseif ($this->game == 'uranium') {
            if (Auth::guard('uranium')->attempt(['username' => $trimmed_username, 'password' => $trimmed_pass])) {
                session()->regenerate();
                return redirect(route('Home'));
            } else {
                session()->flash('error', 'Invalid credentials');
            }
        } elseif ($this->game == 'coleslaw') {
            if (Auth::guard('coleslaw')->attempt(['username' => $trimmed_username, 'password' => $trimmed_pass])) {
                session()->regenerate();
                return redirect(route('Home'));
            } else {
                session()->flash('error', 'Invalid credentials');
            }
        }
    }

    public function logout(): \Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        Auth::logout();
        return redirect(route('Secure_Login'));
    }
}