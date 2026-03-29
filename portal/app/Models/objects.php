<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $d_id
 * @property int $x
 * @property int $y
 * @property int $id
 * @property int $direction
 * @property int $type
 */
#[Table(key: 'd_id')]
#[Fillable(['x', 'y', 'id', 'direction', 'type'])]
class objects extends Model {}
