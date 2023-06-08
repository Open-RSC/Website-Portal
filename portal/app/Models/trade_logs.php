<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $player1
 * @property string $player2
 * @property string $player1_items
 * @property string $player2_items
 * @property string $player1_ip
 * @property string $player2_ip
 * @property int $time
 */
class trade_logs extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['player1', 'player2', 'player1_items', 'player2_items', 'player1_ip', 'player2_ip', 'time'];
}
