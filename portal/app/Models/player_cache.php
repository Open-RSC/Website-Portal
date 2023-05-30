<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $dbid
 * @property int $playerID
 * @property bool $type
 * @property string $key
 * @property string $value
 */
class player_cache extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'player_cache';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'dbid';

    /**
     * @var array
     */
    protected $fillable = ['playerID', 'type', 'key', 'value'];
}
