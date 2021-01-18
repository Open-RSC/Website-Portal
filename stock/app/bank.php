<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $playerID
 * @property int $itemID
 * @property int $slot
 */
class bank extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'bank';

    /**
     * @var array
     */
    protected $fillable = ['playerID', 'itemID', 'slot'];

}
