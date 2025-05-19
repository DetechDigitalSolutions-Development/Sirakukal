<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    const DISTRICTS = [
        'Thirukonamalai' => 'Thirukonamalai',
        'Mattakalappu' => 'Mattakalappu',
        'Amparai' => 'Amparai',
        'Nuwara Eliya' => 'Nuwara Eliya',
        'Mullaitivu' => 'Mullaitivu',
        'Vavuniya' => 'Vavuniya',
        'Kilinochchi' => 'Kilinochchi',
        'Yarlpannam' => 'Yarlpannam',
        'Mannar' => 'Mannar',
        'Kandy' => 'Kandy',
        'Matale' => 'Matale',
        'Puttalam' => 'Puttalam',
        'Badulla' => 'Badulla',
        'Kegalle' => 'Kegalle',
        'Colombo' => 'Colombo',
        'Gampaha' => 'Gampaha',
        'Kalutara' => 'Kalutara',
        'Kurunegala' => 'Kurunegala',
        'Ratnapura' => 'Ratnapura',
        'Polonnaruwa' => 'Polonnaruwa',
        'Anuradhapura' => 'Anuradhapura',
        'Monaragala' => 'Monaragala',
        'Hambantota' => 'Hambantota',
        'Matara' => 'Matara',
        'Galle' => 'Galle',
    ];

    const EDUCATION_LEVELS = [
        'School Leaver' => 'School Leaver',
        'Undergraduate' => 'Undergraduate',
        'Graduate' => 'Graduate',
        'Professional' => 'Professional',
        'Entrepreneur' => 'Entrepreneur',
    ];

    const HEARD_SOURCES = [
        'Friends' => 'Friends',
        'Social Media' => 'Social Media',
        'Newspapers' => 'Newspapers',
        'Others' => 'Others',
    ];

    const CATERGORY =[
        'Competitions' => 'Competitions',
        'Meetups' => 'Meetups',
        'Events' => 'Events',
        'Classes' => 'Classes',
    ];

    const TYPE =[
        'Physical' => 'Physical',
        'Online' => 'Online',
    ];

    const STATUS =[
        'Working' => 'Working',
        'Studying' => 'Studying',
        'Leaving School' => 'Leaving School',
    ];

    protected $fillable = [
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
    ];


    protected $casts = [
        'skills' => 'array',
        'interested_areas' => 'array',
    ];
}
