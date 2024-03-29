<?php

namespace App\Http\Livewire;

use App\Models\curstats;
use App\Models\experience;
use App\Models\players;
use App\Rules\not_contains;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class Registration extends Component
{
    public $game = '';
    public $username = '';
    public $email = '';
    public $password = '';
    public $passwordConfirmation = '';
    public $terms = '';
    public $honeyPasses = '';
    public $honeyInputs = '';

    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.Registration');
    }

    protected array $rules = [
        'game' => 'required',
        'username' => ['required', 'max:12'],
        'password' => ['required', 'max:20'],
    ];

    private function resetInputFields()
    {
        $this->game = '';
        $this->username = '';
        $this->email = '';
        $this->password = '';
        $this->passwordConfirmation = '';
        $this->terms = '';
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
            'game' => 'required',
            'username' => ['bail', 'required', 'min:2', 'max:12', new not_contains, 'unique:' . $this->game . '.players'],
            'password' => 'required|min:4|max:20|same:passwordConfirmation',
            'email' => ['required', 'email', new not_contains],
            'terms' => 'accepted',
        ]);

        $data = [
            'username' => trim(preg_replace('/[-_.]/', ' ', $this->username)),
            'email' => strtolower($this->email),
            'pass' => bcrypt($this->password),
            'creation_date' => now()->timestamp,
            'creation_ip' => $this->getClientIPaddress(),
        ];

        players::on($this->game)->create($data);

        $user = players::on($this->game)->where('username', trim(preg_replace('/[-_.]/', ' ', $this->username)))->first();

        curstats::on($this->game)->create([
            'playerID' => $user->id,
            'hits' => 10
        ]);

        experience::on($this->game)->create([
            'playerID' => $user->id,
            'hits' => 4000
        ]);

        session()->flash('success', 'The player was successfully registered.');
        $this->resetInputFields();
    }
}