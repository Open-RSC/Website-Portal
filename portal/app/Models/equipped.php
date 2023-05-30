<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $playerID
 * @property int $itemID
 */
class equipped extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'equipped';

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
    protected $fillable = ['playerID'];
}
