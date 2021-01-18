<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $itemID
 * @property int $catalogID
 * @property int $amount
 * @property boolean $noted
 * @property boolean $wielded
 * @property int $durability
 */
class itemstatuses extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'itemID';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['catalogID', 'amount', 'noted', 'wielded', 'durability'];

}
