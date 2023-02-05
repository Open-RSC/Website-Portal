<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User | null
    {
        try {
            Validator::make($input, [
                'name' => ['required', 'string', 'max:255'],
                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                    'unique:users,email',
                ],
                'password' => $this->passwordRules(),
            ])->validate();
        } catch (ValidationException $e) {
            foreach($e->validator->errors()->all() as $error) {
                echo "Error: " . $error . "\n";
            }
            throw new ValidationException($e);
        }

        return User::create([
            'name' => $input['name'],
            'username' => $input['username'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'moderator' => $input['moderator'] ?? 0,
            'admin' => $input['admin'] ?? 0,
        ]);
    }
}
