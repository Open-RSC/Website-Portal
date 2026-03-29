<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Connection;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $db_index
 * @property int $npcdef_id
 * @property string $amount
 * @property int $id
 * @property int $weight
 */
#[Table(key: 'db_index')]
#[Fillable(['npcdef_id', 'amount', 'id', 'weight'])]
#[Connection('cabbage')]
class npcdrops extends Model {}
