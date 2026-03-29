<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $dbid
 * @property int $playerID
 * @property int $friend
 * @property string $friendName
 */
#[Table(key: 'dbid')]
#[Fillable(['playerID', 'friend', 'friendName'])]
class friends extends Model {}
