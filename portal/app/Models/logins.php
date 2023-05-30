<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $dbid
 * @property int $playerID
 * @property int $time
 * @property string $ip
 * @property int $clientVersion
 */
class logins extends Model
{
    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'dbid';

    /**
     * @var array
     */
    protected $fillable = ['playerID', 'time', 'ip', 'clientVersion'];
}
