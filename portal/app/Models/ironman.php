<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $playerID
 * @property int $iron_man
 * @property int $iron_man_restriction
 * @property int $hc_ironman_death
 *
 * @method static where(int $iron_man)
 */
#[Table('ironman')]
#[Fillable(['playerID', 'iron_man', 'iron_man_restriction', 'hc_ironman_death'])]
class ironman extends Model {}
