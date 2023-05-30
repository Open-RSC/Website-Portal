<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $playerID
 * @property int $slot
 * @property string $inventory
 * @property string $equipment
 */
class bankpresets extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['playerID', 'slot', 'inventory', 'equipment'];
}
