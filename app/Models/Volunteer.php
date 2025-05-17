<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    protected $fillable = [
    'volunteer_id',
    'full_name',
    'initials_name',
    'district',
    'address',
    'nic_number',
    'date_of_birth',
    'joined_date',
    'status',
    'institution',
    'email',
    'phone',
    'whatsapp',
    'referred_by',
    'reason_to_join',
    'joined',
];


    protected $casts = [
        'skills' => 'array',
        'interested_areas' => 'array',
    ];
}
