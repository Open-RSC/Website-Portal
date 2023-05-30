<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $tag
 * @property string $leader
 * @property bool $kick_setting
 * @property bool $invite_setting
 * @property bool $allow_search_join
 * @property int $matches_won
 * @property int $matches_lost
 * @property int $clan_points
 * @property int $bank_size
 */
class clan extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'clan';

    /**
     * @var array
     */
    protected $fillable = ['name', 'tag', 'leader', 'kick_setting', 'invite_setting', 'allow_search_join', 'matches_won', 'matches_lost', 'clan_points', 'bank_size'];
}
