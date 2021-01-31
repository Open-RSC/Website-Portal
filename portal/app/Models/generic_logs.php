<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $message
 * @property int $time
 */
class generic_logs extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['message', 'time'];

}
