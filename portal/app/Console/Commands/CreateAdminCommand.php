<?php

namespace App\Console\Commands;

use App\Actions\Fortify\CreateNewUser;
use Illuminate\Console\Command;

class CreateAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:create {--u|username= : Username of the newly created admin.} {--e|email= : E-Mail of the newly created admin.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Manually creates a new Laravel Admin.';

    /**
     * Execute the console command.
     * https://laravel.com/docs/9.x/artisan
     */
    public function handle(): int
    {
        // Enter username, if not present via command line option
        $name = $this->option('username');
        if ($name === null) {
            $name = $this->ask('Please enter your username.');
        }

        // Enter email, if not present via command line option
        $email = $this->option('email');
        if ($email === null) {
            $email = $this->ask('Please enter your E-Mail.');
        }

        // Always enter password from user input for more security.
        $password = $this->secret('Please enter a new password.');
        $password_confirmation = $this->secret('Please confirm the password');

        // Prepare input for the Fortify user creation action
        $input = [
            'name' => $name,
            'username' => $name,
            'email' => $email,
            'password' => $password,
            'password_confirmation' => $password_confirmation,
            'admin' => 1,
        ];

        try {
            // Use Fortify to create a new user.
            $new_user_action = new CreateNewUser();
            $user = $new_user_action->create($input);
        } catch (\Exception $e) {
            $this->error($e->getMessage());
            return 1;
        }

        // Success message
        $this->info('Admin User created successfully!');
        $this->info('New user id: '.$user->id);
        return 0;
    }
}
