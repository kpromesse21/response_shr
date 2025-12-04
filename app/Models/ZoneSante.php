<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ZoneSante extends Model
{
    protected $fillable = [
        'name',
        'region',
        'district',
        'description',
        'longitude',
        'latitude',
    ];
}
