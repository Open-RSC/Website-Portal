<?php

namespace App\Models;

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
class player_contact_details extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'playerID';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['username', 'fullname', 'zipCode', 'country', 'email', 'date_modified', 'ip'];

}
