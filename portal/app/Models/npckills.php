<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ID
 * @property int $npcID
 * @property int $playerID
 * @property int $killCount
 */
#[Table(key: 'ID')]
#[Fillable(['npcID', 'playerID', 'killCount'])]
class npckills extends Model {}
