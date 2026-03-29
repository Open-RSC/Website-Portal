<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ID
 * @property int $itemID
 * @property int $playerID
 * @property int $dropAmount
 * @property int $npcId
 * @property string $ts
 */
#[Table(key: 'ID')]
#[Fillable(['itemID', 'playerID', 'dropAmount', 'npcId', 'ts'])]
class droplogs extends Model {}
