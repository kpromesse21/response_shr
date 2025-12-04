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
}
