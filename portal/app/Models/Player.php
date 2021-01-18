<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
class Player extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['username', 'group_id', 'email', 'pass', 'salt', 'combat', 'skill_total', 'x', 'y', 'fatigue', 'petfatigue', 'combatstyle', 'block_chat', 'block_private', 'block_trade', 'block_duel', 'cameraauto', 'onemouse', 'soundoff', 'haircolour', 'topcolour', 'trousercolour', 'skincolour', 'headsprite', 'bodysprite', 'male', 'creation_date', 'creation_ip', 'login_date', 'login_ip', 'banned', 'offences', 'muted', 'kills', 'npc_kills', 'pets', 'deaths', 'iron_man', 'iron_man_restriction', 'hc_ironman_death', 'online', 'quest_points', 'bank_size', 'lastRecoveryTryId', 'transfer'];

}
