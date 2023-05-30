<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $db_index
 * @property int $npcdef_id
 * @property string $amount
 * @property int $id
 * @property int $weight
 */
class npcdrops extends Model
{
    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'db_index';

    /**
     * @var array
     */
    protected $fillable = ['npcdef_id', 'amount', 'id', 'weight'];

    protected $connection = 'cabbage';
}
