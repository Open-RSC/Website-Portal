<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $questionID
 * @property string $question
 */
class recovery_questions extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'questionID';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['question'];

}
