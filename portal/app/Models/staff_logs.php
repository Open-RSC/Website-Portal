<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $staff_username
 * @property bool $action
 * @property string $affected_player
 * @property int $time
 * @property int $staff_x
 * @property int $staff_y
 * @property int $affected_x
 * @property int $affected_y
 * @property string $staff_ip
 * @property string $affected_ip
 * @property string $extra
 */
class staff_logs extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['staff_username', 'action', 'affected_player', 'time', 'staff_x', 'staff_y', 'affected_x', 'affected_y', 'staff_ip', 'affected_ip', 'extra'];
}
