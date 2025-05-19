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
    $eventCount = Event::count(); // Total number of events
    $volunteersCount = Volunteer::count();
    $join_form = SiteSetting::where('key','=','join_form_enabled')->first()?->value;;

    // Format the impact statistics for the view
    $impactStats = $impactController->getImpactStats($volunteersCount, $eventCount);
    
    // Create multiple mock announcements for testing
    $announcements = [];
    
    // First mock announcement
    $announcement1 = new Announcement();
    $announcement1->author = 'John Doe';
    $announcement1->description = 'We are excited to announce our upcoming community cleanup initiative taking place next month. Join us in making our neighborhood cleaner and greener. Volunteers of all ages are welcome to participate.';
    $announcement1->image_url = '/images/image2.jpg';
    $announcements[] = $announcement1;
    
    // Second mock announcement
    $announcement2 = new Announcement();
    $announcement2->author = 'Jane Smith';
    $announcement2->description = 'Sirakukal is partnering with local schools for our new education program. We will be providing resources and mentorship to underprivileged students starting next semester.';
    $announcement2->image_url = '/images/impact-1.png';
    $announcements[] = $announcement2;
    
    // Third mock announcement
    $announcement3 = new Announcement();
    $announcement3->author = 'Mike Johnson';
    $announcement3->description = 'Thank you to all volunteers who participated in last weekend\'s food drive. We collected over 500 pounds of food for local families in need.';
    $announcement3->image_url = '/images/impact-4.jpg';
    $announcements[] = $announcement3;

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
