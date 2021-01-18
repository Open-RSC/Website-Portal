<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $playerID
 * @property string $eventAlias
 * @property int $date
 * @property string $ip
 * @property string $message
 */
class player_security_changes extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['playerID', 'eventAlias', 'date', 'ip', 'message'];

}
