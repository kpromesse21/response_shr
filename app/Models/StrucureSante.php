<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StrucureSante extends Model
{
    //
    protected $fillable = [
        'name',
        'type',
        'address',
        'phone',
        'email',
        'zone_sante_id',
    ];

    public function zoneSante()
    {
        return $this->belongsTo(ZoneSante::class);
    }
}
