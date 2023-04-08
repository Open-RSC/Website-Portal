<?php

namespace App\Actions\Fortify;

use App\Models\players;
use App\Models\User;
use App\Traits\CreateUserValidation;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use function App\Helpers\add_characters;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules, CreateUserValidation;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): bool | RedirectResponse |  null
    {
        $this->validateCreateUserInput($input);
        $password = add_characters($input['password'], 20);
        $player = new players();
        $trimmed_username = trim(preg_replace('/[-_.]/', ' ', $input['username']));
        $playerCreated = $player->setDbConnection($input['db'])->create([
            'username' => $trimmed_username,
            'email' => $input['email'],
            'password' => Hash::make($password)
        ])->save();
        //$player->setDbConnection($input['db'])
        return $playerCreated;
    }

}
