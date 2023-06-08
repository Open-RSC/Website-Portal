<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $clan_id
 * @property string $username
 * @property bool $rank
 * @property int $kills
 * @property int $deaths
 */
class clan_players extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['clan_id', 'username', 'rank', 'kills', 'deaths'];
}
