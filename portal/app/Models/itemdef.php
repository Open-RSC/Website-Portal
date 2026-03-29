<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $command
 * @property bool $isFemaleOnly
 * @property bool $isMembersOnly
 * @property bool $isStackable
 * @property bool $isUntradable
 * @property bool $isWearable
 * @property int $appearanceID
 * @property int $wearableID
 * @property int $wearSlot
 * @property int $requiredLevel
 * @property int $requiredSkillID
 * @property int $armourBonus
 * @property int $weaponAimBonus
 * @property int $weaponPowerBonus
 * @property int $magicBonus
 * @property int $prayerBonus
 * @property int $basePrice
 * @property bool $isNoteable
 */
#[Table('itemdef', incrementing: false)]
#[Fillable(['name', 'description', 'command', 'isFemaleOnly', 'isMembersOnly', 'isStackable', 'isUntradable', 'isWearable', 'appearanceID', 'wearableID', 'wearSlot', 'requiredLevel', 'requiredSkillID', 'armourBonus', 'weaponAimBonus', 'weaponPowerBonus', 'magicBonus', 'prayerBonus', 'basePrice', 'isNoteable'])]
class itemdef extends Model {}
