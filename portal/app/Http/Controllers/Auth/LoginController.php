<?php

namespace App\Http\Controllers\Auth;

use App\Category;
use App\Models\curstats;
use App\Models\experience;
use App\Models\players;
use Illuminate\Support\Facades\Auth as Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function show_login_form(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('secure.login');
    }

    public function process_login(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|min:3|max:16',
            'password' => 'required|min:4|max:16'
        ]);

        $credentials = $request->except(['_token']);

        $user = players::where('username', $request->name)->first();

        if (!$user) {
            session()->flash('message', 'Invalid credentials');
            return redirect()->back();
        }

        $form_pass = $request['password'];
        if ($user->salt) {
            // accounts with old password compatibility
            $form_pass = hash('sha512', ($user->salt . md5($form_pass)));
        }

        if (auth()->attempt(['username' => $request['name'], 'password' => $form_pass])) {

            return redirect()->route('home');

        } else {
            session()->flash('message', 'Invalid credentials');
            return redirect()->back();
        }
    }

    public function show_signup_form(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('secure.register');
    }

    public function process_signup(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = players::where('username', $request->name)->first();

        if ($user) {
            session()->flash('message', 'Username already taken!');
            return redirect()->back();
        }

        $user = players::create([
            'username' => trim($request->input('name')),
            'email' => strtolower($request->input('email')),
            'pass' => bcrypt($request->input('password')),
        ]);

        curstats::create([
            'playerID' => $user->id,
            'hits' => 10
        ]);

        experience::create([
            'playerID' => $user->id,
            'hits' => 4000
        ]);

        session()->flash('message', 'Your account is created');

        return redirect()->route('login');
    }

    public function logout(): \Illuminate\Http\RedirectResponse
    {
        Auth::logout();

        return redirect()->route('login');
    }

    public function username(): string
    {
        return 'username';
    }
}