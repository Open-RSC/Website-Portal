<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $claim_id
 * @property int $playerID
 * @property int $item_id
 * @property int $item_amount
 * @property string $time
 * @property string $claim_time
 * @property bool $claimed
 * @property string $explanation
 */
#[Table(key: 'claim_id')]
#[Fillable(['playerID', 'item_id', 'item_amount', 'time', 'claim_time', 'claimed', 'explanation'])]
class expired_auctions extends Model {}
