<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PasswordResetRequest extends Model
{
    protected $fillable = [ 'username', 'email', 'db', 'token', 'expires_at', 'ip' ];
}
