<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $dbid
 * @property int $playerID
 * @property bool $type
 * @property string $key
 * @property string $value
 */
#[Table('player_cache', 'dbid')]
#[Fillable(['playerID', 'type', 'key', 'value'])]
class player_cache extends Model {}
