<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['username', 'email', 'db', 'token', 'expires_at', 'ip'])]
class PasswordResetRequest extends Model {}
