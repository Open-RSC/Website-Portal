<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $playerID
 * @property boolean $attack
 * @property boolean $defense
 * @property boolean $strength
 * @property boolean $hits
 * @property boolean $ranged
 * @property boolean $prayer
 * @property boolean $magic
 * @property boolean $cooking
 * @property boolean $woodcut
 * @property boolean $fletching
 * @property boolean $fishing
 * @property boolean $firemaking
 * @property boolean $crafting
 * @property boolean $smithing
 * @property boolean $mining
 * @property boolean $herblaw
 * @property boolean $agility
 * @property boolean $thieving
 * @property boolean $runecraft
 * @property boolean $harvesting
 */
class curstats extends Model
{
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
