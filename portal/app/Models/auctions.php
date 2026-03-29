<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
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
#[Table(key: 'auctionID', keyType: 'integer')]
#[Fillable(['itemID', 'amount', 'amount_left', 'price', 'seller', 'seller_username', 'buyer_info', 'sold-out', 'time', 'was_cancel'])]
class auctions extends Model {}
