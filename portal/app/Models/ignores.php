<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $dbid
 * @property int $playerID
 * @property int $ignore
 */
#[Table(key: 'dbid')]
#[Fillable(['playerID', 'ignore'])]
class ignores extends Model {}
