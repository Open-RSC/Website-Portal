<?php

namespace App\Http\Controllers\Auth;

use App\Category;
use App\Models\curstats;
use App\Models\players;
use Illuminate\Support\Facades\Auth as Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function show_login_form()
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

    public function show_signup_form()
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

        $user = players::create([
            'username' => trim($request->input('name')),
            'email' => strtolower($request->input('email')),
            'pass' => bcrypt($request->input('password')),
        ]);

        $lastID = players::all()->last()->id;

        #TODO
        # - need to match up creation IP and creation timestamp when registering so those get populated
        # - we also have to have checks to prevent registering existing player names which isn't being done presently
        # - database selection needs a combo box with livewire to load the rest of the registration form once selected
        # - database selection combo box needs to set the presently hardcoded "DB::connection('cabbage')" to the appropriate DB

        DB::connection('cabbage')->table('curstats')
            ->insert([
                'playerID' => $lastID
            ]);

        DB::connection('cabbage')->table('experience')
            ->insert([
                'playerID' => $lastID
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