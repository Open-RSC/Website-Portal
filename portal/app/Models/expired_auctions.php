<?php

namespace App\Models;

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
class expired_auctions extends Model
{
    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'claim_id';

    /**
     * @var array
     */
    protected $fillable = ['playerID', 'item_id', 'item_amount', 'time', 'claim_time', 'claimed', 'explanation'];
}
