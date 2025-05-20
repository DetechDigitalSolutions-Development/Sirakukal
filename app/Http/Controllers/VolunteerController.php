<?php

namespace App\Http\Controllers;

use App\Models\Volunteer;
use Illuminate\Http\Request;

class VolunteerController extends Controller
{
    public function create()
    {

        return view('pages.volunteers.volunteer', [
            'districts' => Volunteer::DISTRICTS,
            'educationLevels' => Volunteer::EDUCATION_LEVELS,
            'heardSources' => Volunteer::HEARD_SOURCES,
            'statuses' => Volunteer::STATUS
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'initials_name' => 'required|string|max:255',
            'district' => 'required|string|in:'.implode(',', Volunteer::DISTRICTS),
            'address' => 'required|string|max:500',
            'nic_number' => [
                'required',
                'string',
                'regex:/^(\d{9}[VvXx]|\d{12})$/'
            ],
            'date_of_birth' => 'required|date',
            'applicant_type' => 'required|string|in:'.implode(',', Volunteer::EDUCATION_LEVELS),
            'status' => 'required|string|in:'.implode(',', Volunteer::STATUS),
            'institution' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'whatsapp' => 'nullable|string|max:15',
            'referred_by' => 'required|string|in:'.implode(',', Volunteer::HEARD_SOURCES),
            'reason_to_join' => 'required|string|max:1000',
        ]);
         $validated['joined_date'] = now()->toDateString(); // YYYY-MM-DD format

        Volunteer::create($validated);

        return redirect('/volunteers/volunteer#volunteer-form')->with('success', 'Your inquiry has been submitted successfully!');

    }
}