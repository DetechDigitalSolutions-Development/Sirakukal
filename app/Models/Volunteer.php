<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
     protected $fillable = [
        'name', 'email', 'phone', 'address', 'skills', 'interested_areas'
    ];

    protected $casts = [
        'skills' => 'array',
        'interested_areas' => 'array',
    ];
}
