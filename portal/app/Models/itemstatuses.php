<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $itemID
 * @property int $catalogID
 * @property int $amount
 * @property bool $noted
 * @property bool $wielded
 * @property int $durability
 */
#[Table(key: 'itemID', incrementing: false)]
#[Fillable(['catalogID', 'amount', 'noted', 'wielded', 'durability'])]
class itemstatuses extends Model {}
