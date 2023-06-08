<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @property int $id
 * @property string $username
 * @property int $group_id
 * @property string $email
 * @property string $pass
 * @property string $salt
 * @property int $combat
 * @property int $skill_total
 * @property int $x
 * @property int $y
 * @property int $fatigue
 * @property bool $combatstyle
 * @property bool $block_chat
 * @property bool $block_private
 * @property bool $block_trade
 * @property bool $block_duel
 * @property bool $cameraauto
 * @property bool $onemouse
 * @property bool $soundoff
 * @property int $haircolour
 * @property int $topcolour
 * @property int $trousercolour
 * @property int $skincolour
 * @property int $headsprite
 * @property int $bodysprite
 * @property bool $male
 * @property int $creation_date
 * @property string $creation_ip
 * @property int $login_date
 * @property string $login_ip
 * @property string $banned
 * @property int $offences
 * @property string $muted
 * @property int $kills
 * @property int $npc_kills
 * @property int $deaths
 * @property bool $iron_man
 * @property bool $iron_man_restriction
 * @property bool $hc_ironman_death
 * @property bool $online
 * @property int $quest_points
 * @property int $bank_size
 * @property int $lastRecoveryTryId
 * @property int $transfer
 */
class retro extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'retro';

    protected $table = 'players';

    public $primaryKey = 'id';

    public $timestamps = false;

    // the below don't work in laravel since type expected should be
    // timestamp and we have as int(10)
    const CREATED_AT = 'creation_date';

    const UPDATED_AT = 'login_date';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['username', 'group_id', 'email', 'pass', 'salt', 'combat', 'skill_total', 'x', 'y', 'fatigue', 'combatstyle', 'block_chat', 'block_private', 'block_trade', 'block_duel', 'cameraauto', 'onemouse', 'soundoff', 'haircolour', 'topcolour', 'trousercolour', 'skincolour', 'headsprite', 'bodysprite', 'male', 'creation_date', 'creation_ip', 'login_date', 'login_ip', 'banned', 'offences', 'muted', 'kills', 'npc_kills', 'deaths', 'iron_man', 'iron_man_restriction', 'hc_ironman_death', 'online', 'quest_points', 'bank_size', 'lastRecoveryTryId', 'transfer'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function getAuthPassword(): string
    {
        return $this->pass; // case sensitive
    }

    public function setDbConnection(string $connection)
    {
        $this->connection = $connection;
    }

    public $connection = '2001scape';
}
