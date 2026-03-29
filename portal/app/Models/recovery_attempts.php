<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $dbid
 * @property int $playerID
 * @property string $username
 * @property int $time
 * @property string $ip
 */
#[Table(key: 'dbid')]
#[Fillable(['playerID', 'username', 'time', 'ip'])]
class recovery_attempts extends Model {}
