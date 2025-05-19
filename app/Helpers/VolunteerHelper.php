<?php

namespace App\Helpers;

use App\Models\Volunteer;

class VolunteerHelper
{
    /**
     * Search for a volunteer by NIC number or name
     *
     * @param string|null $nic
     * @param string|null $name
     * @return array|null
     */
    public static function searchVolunteer($nic = null, $name = null)
    {
        $query = Volunteer::query();
        
        if ($nic) {
            $query->where('nic_number', $nic);
        }
        
        if ($name) {
            $query->where(function($q) use ($name) {
                $q->where('full_name', 'like', "%{$name}%")
                  ->orWhere('initials_name', 'like', "%{$name}%");
            });
        }
        
        $volunteer = $query->first();
        
        if (!$volunteer) {
            return null;
        }
        
        return [
            'id' => $volunteer->id,
            'name' => $volunteer->full_name,
            'nic' => $volunteer->nic_number,
            'phone' => $volunteer->phone,
            'email' => $volunteer->email,
            'status' => $volunteer->status,
            'created_at' => $volunteer->created_at->format('Y-m-d')
        ];
    }
} 