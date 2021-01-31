<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $dbid
 * @property int $id
 * @property int $startX
 * @property int $minX
 * @property int $maxX
 * @property int $startY
 * @property int $minY
 * @property int $maxY
 */
class npclocs extends Model
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
    protected $fillable = ['id', 'startX', 'minX', 'maxX', 'startY', 'minY', 'maxY'];

}
