<?php

namespace App\Actions\Fortify;

use App\Models\players;
use App\Models\User;
use App\Traits\CreateUserValidation;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use function App\Helpers\add_characters;
use function App\Helpers\get_client_ip_address;

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
        $password = $input['password'];
        $player = new players();
        $trimmed_username = trim(preg_replace('/[-_.]/', ' ', $input['username']));
        $player = $player->setDbConnection($input['db'])->create([
            'username' => $trimmed_username,
            'group_id' => 10,
            'email' => $input['email'],
            'pass' => Hash::make($password),
            'creation_date' => time(),
            'creation_ip' => get_client_ip_address()
        ]);
        $playerCreated = $player->save();
        DB::connection($input['db'])->table('maxstats')->insert(['playerID' => $player->id]);
        DB::connection($input['db'])->table('curstats')->insert(['playerID' => $player->id]);
        DB::connection($input['db'])->table('experience')->insert(['playerID' => $player->id]);
        DB::connection($input['db'])->table('capped_experience')->insert(['playerID' => $player->id]);
        $minLevels = [];
        $experiences = [];
        //We currently only allow for the original XP curve. This shouldn't be a problem.
        if ($input['db'] === '2001scape') {
            $minLevels["attack"] = 1;
            $minLevels["defense"] = 1;
            $minLevels["strength"] = 1;
            $minLevels["hits"] = 10;
            $minLevels["ranged"] = 1;
            $minLevels["thieving"] = 1;
            $minLevels["influence"] = 1;
            $minLevels["praygood"] = 1;
            $minLevels["prayevil"] = 1;
            $minLevels["goodmagic"] = 1;
            $minLevels["evilmagic"] = 1;
            $minLevels["cooking"] = 1;
            $minLevels["tailoring"] = 1;
            $minLevels["woodcut"] = 1;
            $minLevels["firemaking"] = 1;
            $minLevels["crafting"] = 1;
            $minLevels["smithing"] = 1;
            $minLevels["mining"] = 1;
            $minLevels["herblaw"] = 1;
        } else {
            $minLevels["attack"] = 1;
            $minLevels["defense"] = 1;
            $minLevels["strength"] = 1;
            $minLevels["hits"] = 10;
            $minLevels["ranged"] = 1;
            $minLevels["prayer"] = 1;
            $minLevels["magic"] = 1;
            $minLevels["cooking"] = 1;
            $minLevels["woodcut"] = 1;
            $minLevels["fletching"] = 1;
            $minLevels["fishing"] = 1;
            $minLevels["firemaking"] = 1;
            $minLevels["crafting"] = 1;
            $minLevels["smithing"] = 1;
            $minLevels["mining"] = 1;
            $minLevels["herblaw"] = 1;
            $minLevels["agility"] = 1;
            $minLevels["thieving"] = 1;
            if ($input['db'] === 'cabbage' || $input['db'] === 'coleslaw') {
                $minLevels["runecraft"] = 1;
                $minLevels["harvesting"] = 1;
            }
        }
        
        foreach ($minLevels as $key => $value) {
            $experiences[$key] = 0;
            if ($key === "hits") {
                $experiences[$key] = 4000;
            }
        }
        
        foreach ($minLevels as $key => $value) {
            DB::connection($input['db'])->table('curstats')
            ->where('playerID', $player->id)
            ->update([$key => $value]);
            DB::connection($input['db'])->table('maxstats')
            ->where('playerID', $player->id)
            ->update([$key => $value]);
        }
        
        foreach ($experiences as $key => $value) {
            DB::connection($input['db'])->table('experience')
            ->where('playerID', $player->id)
            ->update([$key => $value]);
        }
        
        return $playerCreated;
    }

}
