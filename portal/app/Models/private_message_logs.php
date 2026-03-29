<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $sender
 * @property string $message
 * @property string $reciever
 * @property int $time
 */
#[Fillable(['sender', 'message', 'reciever', 'time'])]
class private_message_logs extends Model {}
