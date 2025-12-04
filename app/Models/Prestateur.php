<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestateur extends Model
{
    protected $fillable = [
        'name',
        'lastname',
        'matricule',
        'address',
        'email',
        'phone',
        'specialite',
        'structure_sante_id',
    ];

    public function structureSante()
    {
        return $this->belongsTo(StrucureSante::class);
    }
}
