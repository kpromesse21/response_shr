<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class organisation extends Model
{
    //
    protected $fillable = [
        'name',
        'address',
        'email',
        'phone',
        'website',
        'description',
    ];
    

}
