<?php

namespace App\Http\Auth;

use App\Models\players;
use Illuminate\Support\Facades\Auth as Auth;
use Illuminate\Http\Request;
use App\Http\Controller;
use function App\Helpers\passwd_compat_hasher;

class LoginController extends Controller
{
    public $game = '';
    public $username = '';
    public $password = '';
    public $honeyPasses = '';
    public $honeyInputs = '';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function show_login_form()
    {
        return view('secure.login');
    }

    public function process_login(Request $request)
    {
        $request->validate([
            'username' => 'required|string|min:3|max:16',
            'password' => 'required|min:4|max:16'
        ]);

        $user = players::on($request->game)->where('username', trim(preg_replace('/[-_.]/', ' ', $request->username)))->first();

        if (!$user) {
            session()->flash('message', 'Invalid credentials');
            return redirect()->back();
        }

        $form_pass = $request['password'];
        if ($user->salt) {
            // accounts with old password compatibility
            $form_pass = passwd_compat_hasher($form_pass, $user->salt);
        }

        if (auth()->attempt(['username' => $request['username'], 'password' => $form_pass])) {
        //if (auth()->attempt(['username' => $request['username'], 'password' => $form_pass])) {

            return redirect()->route('Home');

        } else {
            session()->flash('message', 'Invalid credentials');
            return redirect()->back();
        }
    }

    public function logout(): \Illuminate\Http\RedirectResponse
    {
        Auth::logout();

        return redirect()->route('Secure_Login');
    }

    public function username(): string
    {
        return 'username';
    }
}