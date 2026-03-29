<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $sender
 * @property string $message
 * @property int $time
 */
#[Fillable(['sender', 'message', 'time'])]
class chat_logs extends Model {}
