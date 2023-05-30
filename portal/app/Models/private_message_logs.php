<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $sender
 * @property string $message
 * @property string $reciever
 * @property int $time
 */
class private_message_logs extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['sender', 'message', 'reciever', 'time'];
}
