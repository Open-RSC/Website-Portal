<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $playerID
 * @property int $itemID
 * @property int $slot
 */
#[Table('bank')]
#[Fillable(['playerID', 'itemID', 'slot'])]
class bank extends Model {}
