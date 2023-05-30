<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $playerID
 * @property int $iron_man
 * @property int $iron_man_restriction
 * @property int $hc_ironman_death
 *
 * @method static where(int $iron_man)
 */
class ironman extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ironman';

    /**
     * @var array
     */
    protected $fillable = ['playerID', 'iron_man', 'iron_man_restriction', 'hc_ironman_death'];
}
