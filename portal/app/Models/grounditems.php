<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idx
 * @property int $id
 * @property int $x
 * @property int $y
 * @property int $amount
 * @property int $respawn
 */
#[Table(key: 'idx')]
#[Fillable(['id', 'x', 'y', 'amount', 'respawn'])]
class grounditems extends Model {}
