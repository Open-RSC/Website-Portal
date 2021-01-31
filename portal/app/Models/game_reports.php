<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $reporter
 * @property string $reported
 * @property int $time
 * @property int $reason
 * @property string $chatlog
 * @property int $reporter_x
 * @property int $reporter_y
 * @property int $reported_x
 * @property int $reported_y
 * @property boolean $suggests_or_mutes
 * @property boolean $tried_apply_action
 */
class game_reports extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['reporter', 'reported', 'time', 'reason', 'chatlog', 'reporter_x', 'reporter_y', 'reported_x', 'reported_y', 'suggests_or_mutes', 'tried_apply_action'];

}
