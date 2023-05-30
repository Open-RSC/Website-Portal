<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $d_id
 * @property int $x
 * @property int $y
 * @property int $id
 * @property int $direction
 * @property int $type
 */
class objects extends Model
{
    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'd_id';

    /**
     * @var array
     */
    protected $fillable = ['x', 'y', 'id', 'direction', 'type'];
}
