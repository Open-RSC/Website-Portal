<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $dbid
 * @property int $playerID
 * @property int $id
 * @property int $stage
 */
class quests extends Model
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
    protected $fillable = ['playerID', 'id', 'stage'];
}
