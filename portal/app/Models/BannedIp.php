<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BannedIp extends Model
{
    protected $fillable = ['ip_address'];
}
