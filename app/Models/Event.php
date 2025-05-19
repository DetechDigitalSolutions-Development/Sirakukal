<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    const TYPE  = [
        'Online' => 'Online',
        'Physical' => 'Physical',
    ];

    const CATEGORY = [
        'Event' => 'Event',
        'Competition' => 'Competition',
        'Meetup' => 'Meetup',
        'Class' => 'Class',
    ];

    protected $fillable = [
        'name',
        'date',
        'time',
        'venue',
        'description',
        'image_url',
        'category',
        'type',
        'references_links',
        'link',
    ];

    protected $casts = [
        'references_links' => 'array', // Cast to array for multiple files
    ];
}
