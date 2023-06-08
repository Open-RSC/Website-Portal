<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idx
 * @property int $id
 * @property int $x
 * @property int $y
 * @property int $amount
 * @property int $respawn
 */
class grounditems extends Model
{
    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'idx';

    /**
     * @var array
     */
    protected $fillable = ['id', 'x', 'y', 'amount', 'respawn'];
}
