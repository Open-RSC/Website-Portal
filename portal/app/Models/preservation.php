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
 * @property int $petfatigue
 * @property boolean $combatstyle
 * @property boolean $block_chat
 * @property boolean $block_private
 * @property boolean $block_trade
 * @property boolean $block_duel
 * @property boolean $cameraauto
 * @property boolean $onemouse
 * @property boolean $soundoff
 * @property int $haircolour
 * @property int $topcolour
 * @property int $trousercolour
 * @property int $skincolour
 * @property int $headsprite
 * @property int $bodysprite
 * @property boolean $male
 * @property int $creation_date
 * @property string $creation_ip
 * @property int $login_date
 * @property string $login_ip
 * @property string $banned
 * @property int $offences
 * @property string $muted
 * @property int $kills
 * @property int $npc_kills
 * @property int $pets
 * @property int $deaths
 * @property boolean $iron_man
 * @property boolean $iron_man_restriction
 * @property boolean $hc_ironman_death
 * @property boolean $online
 * @property int $quest_points
 * @property int $bank_size
 * @property int $lastRecoveryTryId
 * @property int $transfer
 */
class preservation extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $connection = 'preservation';
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
    protected $fillable = ['username', 'group_id', 'email', 'pass', 'salt', 'combat', 'skill_total', 'x', 'y', 'fatigue', 'petfatigue', 'combatstyle', 'block_chat', 'block_private', 'block_trade', 'block_duel', 'cameraauto', 'onemouse', 'soundoff', 'haircolour', 'topcolour', 'trousercolour', 'skincolour', 'headsprite', 'bodysprite', 'male', 'creation_date', 'creation_ip', 'login_date', 'login_ip', 'banned', 'offences', 'muted', 'kills', 'npc_kills', 'pets', 'deaths', 'iron_man', 'iron_man_restriction', 'hc_ironman_death', 'online', 'quest_points', 'bank_size', 'lastRecoveryTryId', 'transfer'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];
}
