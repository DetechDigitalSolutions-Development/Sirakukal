<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Event;
use App\Models\Testimonial;
use App\Models\SiteSetting;
use App\Models\Volunteer;
use App\Models\Announcement;
use App\Http\Controllers\ImpactController;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ImpactController $impactController)
{
    $today = Carbon::today(); // today as a Carbon date object

    // Get all events from today onwards
    $upcomingEvents = Event::where('date', '>=', $today)->orderBy('date')->get();
    // Get all rows from testimonials table
    $testimonials = Testimonial::all();
    $eventCount = Event::where('date', '<', now())->count() + 600; // Total number of events
    $volunteersCount = Volunteer::count();
    $join_form = SiteSetting::where('key','=','join_form_enabled')->first()?->value;;

    // Format the impact statistics for the view
    $impactStats = $impactController->getImpactStats($volunteersCount, $eventCount);
    
    // Create multiple mock announcements for testing
    $announcements = Announcement::all();


    return view('pages.home', compact('upcomingEvents','testimonials','join_form','volunteersCount','eventCount','impactStats','announcements'));
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
