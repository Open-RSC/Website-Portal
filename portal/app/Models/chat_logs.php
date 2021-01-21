<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $sender
 * @property string $message
 * @property int $time
 */
class chat_logs extends Model
{
    /**
     * @var array
     */
    protected array $fillable = ['sender', 'message', 'time'];

}
