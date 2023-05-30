<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ID
 * @property int $npcID
 * @property int $playerID
 * @property int $killCount
 */
class npckills extends Model
{
    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'ID';

    /**
     * @var array
     */
    protected $fillable = ['npcID', 'playerID', 'killCount'];
}
