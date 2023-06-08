<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ID
 * @property int $itemID
 * @property int $playerID
 * @property int $dropAmount
 * @property int $npcId
 * @property string $ts
 */
class droplogs extends Model
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
    protected $fillable = ['itemID', 'playerID', 'dropAmount', 'npcId', 'ts'];
}
