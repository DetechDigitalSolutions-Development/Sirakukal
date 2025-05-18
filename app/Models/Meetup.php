<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meetup extends Model
{
    protected $fillable = [
        'name',
        'date',
        'time',
        'venue',
        'description',
        'image_url',
        'category',   
        'link',       
        
    ];
}
