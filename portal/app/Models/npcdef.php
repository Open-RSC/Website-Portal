<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $command
 * @property string $command2
 * @property int $attack
 * @property int $strength
 * @property int $hits
 * @property int $defense
 * @property int $ranged
 * @property int $combatlvl
 * @property bool $isMembers
 * @property bool $attackable
 * @property bool $aggressive
 * @property int $respawnTime
 * @property int $sprites1
 * @property int $sprites2
 * @property int $sprites3
 * @property int $sprites4
 * @property int $sprites5
 * @property int $sprites6
 * @property int $sprites7
 * @property int $sprites8
 * @property int $sprites9
 * @property int $sprites10
 * @property int $sprites11
 * @property int $sprites12
 * @property int $hairColour
 * @property int $topColour
 * @property int $bottomColour
 * @property int $skinColour
 * @property int $camera1
 * @property int $camera2
 * @property int $walkModel
 * @property int $combatModel
 * @property int $combatSprite
 * @property bool $canEdit
 * @property bool $roundMode
 *
 * @method static where(string $string, string $string1, string $searchTerm)
 */
class npcdef extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'npcdef';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['name', 'description', 'command', 'command2', 'attack', 'strength', 'hits', 'defense', 'ranged', 'combatlvl', 'isMembers', 'attackable', 'aggressive', 'respawnTime', 'sprites1', 'sprites2', 'sprites3', 'sprites4', 'sprites5', 'sprites6', 'sprites7', 'sprites8', 'sprites9', 'sprites10', 'sprites11', 'sprites12', 'hairColour', 'topColour', 'bottomColour', 'skinColour', 'camera1', 'camera2', 'walkModel', 'combatModel', 'combatSprite', 'canEdit', 'roundMode'];

    protected $connection = 'cabbage';
}
