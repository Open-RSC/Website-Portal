<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $playerID
 * @property int $slot
 * @property string $inventory
 * @property string $equipment
 */
#[Fillable(['playerID', 'slot', 'inventory', 'equipment'])]
class bankpresets extends Model {}
