<?php


namespace App\Http\Controllers\Auth;
use App\Models\players;
use App\Models\User;
use Illuminate\Support\Facades\Auth as Auth;

//use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
    public function process_login(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:16',
            'password' => 'required|min:4|max:16'
        ]);

        $credentials = $request->except(['_token']);

        $user = players::where('username',$request->name)->first();

        if (auth()->attempt(['username' => $request['name'], 'password' => $request['password']])) {

            return redirect()->route('home');

        }else{
            session()->flash('message', 'Invalid credentials');
            return redirect()->back();
        }
    }
    public function show_signup_form()
    {
        return view('secure.register');
    }
    public function process_signup(Request $request)
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

        session()->flash('message', 'Your account is created');

        // TODO: although technically does create account
        // in-game not yet usable since some tables are not filled out

        return redirect()->route('login');
    }
    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }

    public function username()
    {
        return 'username';
    }
}