<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $dbid
 * @property int $playerID
 * @property int $friend
 * @property string $friendName
 */
class friends extends Model
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
    protected $fillable = ['playerID', 'friend', 'friendName'];
}
