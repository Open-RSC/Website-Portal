<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $playerID
 * @property string $username
 * @property string $fullname
 * @property string $zipCode
 * @property string $country
 * @property string $email
 * @property int $date_modified
 * @property string $ip
 */
#[Table(key: 'playerID', incrementing: false)]
#[Fillable(['username', 'fullname', 'zipCode', 'country', 'email', 'date_modified', 'ip'])]
class player_contact_details extends Model {}
