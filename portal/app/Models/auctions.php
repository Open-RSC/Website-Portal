<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $auctionID
 * @property int $itemID
 * @property int $amount
 * @property int $amount_left
 * @property int $price
 * @property int $seller
 * @property string $seller_username
 * @property string $buyer_info
 * @property bool $sold-out
 * @property string $time
 * @property bool $was_cancel
 */
class auctions extends Model
{
    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'auctionID';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['itemID', 'amount', 'amount_left', 'price', 'seller', 'seller_username', 'buyer_info', 'sold-out', 'time', 'was_cancel'];
}
