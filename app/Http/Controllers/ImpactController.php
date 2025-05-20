<?php

namespace App\Http\Controllers;
use App\Models\SiteSetting;
use App\Models\Story;
use App\Models\Volunteer;
use App\Models\Event;

use Illuminate\Http\Request;

class ImpactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eventCount = Event::where('date', '<', now())->count() + 600; // Count past events plus 600 completed events
        $volunteersCount = Volunteer::count();
        $stories = Story::all();
        $join_form = SiteSetting::where('key','=','join_form_enabled');

        // Format the impact statistics for the view
        $impactStats = $this->getImpactStats($volunteersCount, $eventCount);

        return view('pages.impact', compact('stories', 'join_form', 'impactStats'));
    }

    /**
     * Get formatted impact statistics.
     * 
     * @param int $volunteersCount Number of volunteers
     * @param int $eventCount Number of events
     * @return array Formatted impact statistics
     */
    public function getImpactStats($volunteersCount = 0, $eventCount = 0)
    {
        // Estimate hours based on events and volunteers (adjust as needed)
        $hoursEstimate = $eventCount * 5 * 5; // Assuming 5 volunteers per event, 5 hours per volunteer
        
        return [
            'volunteers' => $volunteersCount > 0 ? number_format($volunteersCount) . '+' : '+',
            'hours' => $hoursEstimate > 0 ? number_format($hoursEstimate) . '+' : '',
            'events' => $eventCount > 0 ? number_format($eventCount) : ''
        ];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
