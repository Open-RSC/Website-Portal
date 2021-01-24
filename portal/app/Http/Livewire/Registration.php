<?php

namespace App\Http\Livewire;

use App\Models\curstats;
use App\Models\experience;
use App\Models\players;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class Registration extends Component
{
    public $username = '';
    public $email = '';
    public $password = '';
    public $passwordConfirmation = '';

    public function render()
    {
        return view('livewire.Registration');
    }

    protected $rules = [
        'username' => 'required|min:3|max:12|unique:cabbage.players',
        'password' => 'required|min:4|max:20|same:passwordConfirmation',
    ];

    private function resetInputFields()
    {
        $this->username = '';
        $this->email = '';
        $this->password = '';
        $this->passwordConfirmation = '';
    }

    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function getClientIPaddress()
    {
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
            $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
            $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        }
        $client = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote = $_SERVER['REMOTE_ADDR'];
        if (filter_var($client, FILTER_VALIDATE_IP)) {
            $clientIp = $client;
        } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
            $clientIp = $forward;
        } else {
            $clientIp = $remote;
        }
        return $clientIp;
    }

    public function registerStore()
    {
        $v = $this->validate([
            'username' => 'required|min:3|max:12|unique:cabbage.players',
            'password' => 'required|min:4|max:20|same:passwordConfirmation',
            'email' => 'required|email',
        ]);

        $data = [
            'username' => trim($this->username),
            'email' => strtolower($this->email),
            'pass' => bcrypt($this->password),
            'creation_date' => now()->timestamp,
            'creation_ip' => $this->getClientIPaddress(),
        ];

        players::create($data);

        $user = players::where('username', $this->username)->first();

        curstats::create([
            'playerID' => $user->id,
            'hits' => 10
        ]);

        experience::create([
            'playerID' => $user->id,
            'hits' => 4000
        ]);

        session()->flash('message', 'You have been successfully registered.');
        $this->resetInputFields();
    }
}