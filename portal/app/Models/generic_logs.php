<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $message
 * @property int $time
 */
#[Fillable(['message', 'time'])]
class generic_logs extends Model {}
