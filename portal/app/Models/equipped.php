<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $playerID
 * @property int $itemID
 */
#[Table('equipped', 'itemID', incrementing: false)]
#[Fillable(['playerID'])]
class equipped extends Model {}
