<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $username
 * @property string $message
 * @property int $time
 */
class live_feeds extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['username', 'message', 'time'];

}
