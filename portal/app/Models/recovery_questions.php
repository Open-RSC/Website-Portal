<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $questionID
 * @property string $question
 */
#[Table(key: 'questionID', incrementing: false)]
#[Fillable(['question'])]
class recovery_questions extends Model {}
