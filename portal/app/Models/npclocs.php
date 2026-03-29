<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $dbid
 * @property int $id
 * @property int $startX
 * @property int $minX
 * @property int $maxX
 * @property int $startY
 * @property int $minY
 * @property int $maxY
 */
#[Table(key: 'dbid')]
#[Fillable(['id', 'startX', 'minX', 'maxX', 'startY', 'minY', 'maxY'])]
class npclocs extends Model {}
