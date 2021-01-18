<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $playerID
 * @property int $attack
 * @property int $defense
 * @property int $strength
 * @property int $hits
 * @property int $ranged
 * @property int $prayer
 * @property int $magic
 * @property int $cooking
 * @property int $woodcut
 * @property int $fletching
 * @property int $fishing
 * @property int $firemaking
 * @property int $crafting
 * @property int $smithing
 * @property int $mining
 * @property int $herblaw
 * @property int $agility
 * @property int $thieving
 * @property int $runecraft
 * @property int $harvesting
 */
class experience extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'experience';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'playerID';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['attack', 'defense', 'strength', 'hits', 'ranged', 'prayer', 'magic', 'cooking', 'woodcut', 'fletching', 'fishing', 'firemaking', 'crafting', 'smithing', 'mining', 'herblaw', 'agility', 'thieving', 'runecraft', 'harvesting'];

}
