<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $playerID
 * @property bool $attack
 * @property bool $defense
 * @property bool $strength
 * @property bool $hits
 * @property bool $ranged
 * @property bool $prayer
 * @property bool $magic
 * @property bool $cooking
 * @property bool $woodcut
 * @property bool $fletching
 * @property bool $fishing
 * @property bool $firemaking
 * @property bool $crafting
 * @property bool $smithing
 * @property bool $mining
 * @property bool $herblaw
 * @property bool $agility
 * @property bool $thieving
 * @property bool $runecraft
 * @property bool $harvesting
 */
class curstats extends Model
{
    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'playerID';

    const CREATED_AT = '';

    const UPDATED_AT = '';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['playerID', 'attack', 'defense', 'strength', 'hits', 'ranged', 'prayer', 'magic', 'cooking', 'woodcut', 'fletching', 'fishing', 'firemaking', 'crafting', 'smithing', 'mining', 'herblaw', 'agility', 'thieving', 'runecraft', 'harvesting'];

    // Selects which database to query
    protected $connection = 'cabbage';
}
