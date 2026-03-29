<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Connection;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Attributes\WithoutTimestamps;
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
#[Table('experience', 'playerID', incrementing: false)]
#[WithoutTimestamps]
#[Fillable(['playerID', 'attack', 'defense', 'strength', 'hits', 'ranged', 'prayer', 'magic', 'cooking', 'woodcut', 'fletching', 'fishing', 'firemaking', 'crafting', 'smithing', 'mining', 'herblaw', 'agility', 'thieving', 'runecraft', 'harvesting'])]
#[Connection('cabbage')]
class experience extends Model {}
