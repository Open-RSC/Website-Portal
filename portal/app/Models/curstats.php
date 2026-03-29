<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Connection;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Attributes\WithoutTimestamps;
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
#[Table(key: 'playerID', incrementing: false)]
#[WithoutTimestamps]
#[Fillable(['playerID', 'attack', 'defense', 'strength', 'hits', 'ranged', 'prayer', 'magic', 'cooking', 'woodcut', 'fletching', 'fishing', 'firemaking', 'crafting', 'smithing', 'mining', 'herblaw', 'agility', 'thieving', 'runecraft', 'harvesting'])]
#[Connection('cabbage')]
class curstats extends Model
{
    const CREATED_AT = '';

    const UPDATED_AT = '';
}
