<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $playerID
 * @property string $username
 * @property string $question1
 * @property string $answer1
 * @property string $question2
 * @property string $answer2
 * @property string $question3
 * @property string $answer3
 * @property string $question4
 * @property string $answer4
 * @property string $question5
 * @property string $answer5
 * @property int $date_set
 * @property string $ip_set
 * @property string $previous_pass
 * @property string $earlier_pass
 */
class player_recovery extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'player_recovery';

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
    protected $fillable = ['username', 'question1', 'answer1', 'question2', 'answer2', 'question3', 'answer3', 'question4', 'answer4', 'question5', 'answer5', 'date_set', 'ip_set', 'previous_pass', 'earlier_pass'];
}
