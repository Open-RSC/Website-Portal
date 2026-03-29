<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $dbid
 * @property int $playerID
 * @property int $id
 * @property int $stage
 */
#[Table(key: 'dbid')]
#[Fillable(['playerID', 'id', 'stage'])]
class quests extends Model {}
