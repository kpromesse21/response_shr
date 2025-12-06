<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Indicateur extends Model
{
    protected $fillable = [
        'name', 
        "week",
        'structure',
        'q_indicateur',
    ];

   public function strucureSante()
   {
       return $this->belongsTo(StrucureSante::class, 'structure');
   }
}