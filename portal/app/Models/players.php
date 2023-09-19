<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

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
 * @property int $pets
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
class players extends Authenticatable
{
    use HasFactory, Notifiable;

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

    public function getAuthPassword(): string
    {
        return $this->pass; // case sensitive
    }

    public function setDbConnection(string $connection)
    {
        $this->connection = $connection;

        return $this;
    }

    public function isOwner()
    {
        return $this->group_id == config('group.owner');
    }

    public function isAdmin()
    {
        return $this->group_id == config('group.admin');
    }

    public function isSuperModerator()
    {
        return $this->group_id == config('group.super_moderator');
    }

    public function isModerator()
    {
        return $this->group_id == config('group.moderator');
    }

    public function isTester()
    {
        return $this->group_id == config('group.tester');
    }

    public function isEvent()
    {
        return $this->group_id == config('group.event');
    }

    public function isPlayerModerator()
    {
        return $this->group_id == config('group.player_moderator');
    }

    public function isUser()
    {
        return $this->group_id = $this->group_id == config('group.user');
    }

    public function hasAdmin()
    {
        return $this->group_id == config('group.admin') || $this->isOwner();
    }

    public function hasModerator()
    {
        return $this->group_id == config('group.super_moderator') || $this->group_id == config('group.moderator') || $this->isOwner() || $this->isAdmin();
    }

    public function hasPlayerModerator()
    {
        return $this->group_id == config('group.player_moderator') || $this->isModerator() || $this->isOwner() || $this->isAdmin();
    }

    public $connection = 'preservation'; //Default to preservation, used for auth.php login authentication.

    public static function hasBank($db, $playerID) {
        $result = DB::connection($db)
            ->table('bank as b')
            ->join('itemstatuses as is_b', 'b.itemID', '=', 'is_b.itemID')
            ->where('b.playerID', '=', $playerID)
            ->where('is_b.amount', '>', 0)
            ->count();

        return $result > 0;
    }

    public static function hasInventory($db, $playerID) {
        $result = DB::connection($db)
            ->table('invitems as i')
            ->join('itemstatuses as is_i', 'i.itemID', '=', 'is_i.itemID')
            ->where('i.playerID', '=', $playerID)
            ->where('is_i.amount', '>', 0)
            ->count();

        return $result > 0;
    }

}
