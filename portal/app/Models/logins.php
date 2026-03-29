<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $dbid
 * @property int $playerID
 * @property int $time
 * @property string $ip
 * @property int $clientVersion
 */
#[Table(key: 'dbid')]
#[Fillable(['playerID', 'time', 'ip', 'clientVersion'])]
class logins extends Model {}
