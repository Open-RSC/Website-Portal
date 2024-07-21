<?php

namespace App\Console\Commands;

use App\Actions\Fortify\CreateNewUser;
use App\Models\InviteCode;
use App\Models\Setting;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class CreateUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create {--u|username= : Username of the newly created user.} {--e|email= : E-Mail of the newly created user.} {--d|db= : Database for the newly created user.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Manually creates a new Laravel User.';

    /**
     * Execute the console command.
     * https://laravel.com/docs/9.x/artisan
     */
    public function handle(): int
    {
        // Mock IP for command line registration
        $_SERVER['HTTP_CLIENT_IP'] = '192.0.2.1';
        $_SERVER['HTTP_X_FORWARDED_FOR'] = '192.0.2.1';
        $_SERVER['REMOTE_ADDR'] = '192.0.2.1';
        // Enter db, if not present via command line option
        $db = $this->option('db');
        $validDatabases = ['preservation', 'cabbage', '2001scape', 'coleslaw', 'uranium', 'openpk'];
        while ($db === null || !in_array($db, $validDatabases)) {
            if ($db !== null) {
                $this->error('Invalid database. Please choose from the valid options.');
            }
            $db = $this->ask('Please enter the database', 'preservation'); // 'preservation' as a default value
        }

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
            'db' => $db,
        ];
        // Check if invite-only mode is enabled
        $inviteOnly = Setting::where('key', 'invite_only_registration')->value('value') === '1';
        $inviteCode = '';
        if ($inviteOnly) {
            // Generate an invite code
            $inviteCode = Str::uuid()->toString();
            InviteCode::create([
                'code' => $inviteCode,
                'used' => false,
                'username' => $name,
                'world' => $db,
            ]);
            $input['invite_code'] = $inviteCode;
        }

        try {
            // Use Fortify to create a new user.
            $new_user_action = new CreateNewUser();
            $user = $new_user_action->create($input);

            if ($inviteCode) {
                // Mark the invite code as used
                $invite = InviteCode::where('code', $inviteCode)->first();
                if ($invite) {
                    $invite->used = true;
                    $invite->save();
                }
            }
        } catch (\Exception $e) {
            $this->error($e->getMessage());

            return 1;
        }

        // Success message
        if ($user) {
            $this->info('User '.$name.' created successfully!');
        }
        if ($inviteCode) {
            $this->info('Invite code generated for user: '.$inviteCode);
        }

        return 0;
    }
}
