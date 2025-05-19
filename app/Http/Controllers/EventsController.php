<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Event;
use App\Models\SiteSetting;

use Illuminate\Http\Request;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $today = Carbon::today(); // today as a Carbon date object
        
        // Use mock data for testing instead of database query
        // Comment this section and uncomment the database query when ready for production
        //$events = $this->getMockEvents();
        
        // Database query - uncomment when ready for production
         $events = Event::where('date', '>=', $today)->orderBy('date')->get();
        
        $join_form = SiteSetting::where('key','=','join_form_enabled')->first();
        
        // If join_form is null, create a mock for testing
        if (!$join_form) {
            $join_form = (object) ['value' => true];
        }

        // Get event types from the Event model constants
        $eventTypes = array_values(Event::CATEGORY);
        
        // Define available locations (could be made dynamic in the future)
        $eventLocations = [
          'Colombo' => 'Western Province',
          'Kandy' => 'Central Province',
          'Galle' => 'Southern Province',
          'Jaffna' => 'Northern Province',
          'Thirukonamalai' => 'Eastern Province',
          'Mattakalappu' => 'Eastern Province',
          'Amparai' => 'Eastern Province',
          'Nuwara Eliya' => 'Central Province',
          'Mullaitivu' => 'Northern Province',
          'Vavuniya' => 'Northern Province',
          'Kilinochchi' => 'Northern Province',
          'Yarlpannam' => 'Northern Province',
          'Mannar' => 'Northern Province',
          'Matale' => 'Central Province',
          'Puttalam' => 'North Western Province',
          'Badulla' => 'Uva Province',
          'Kegalle' => 'Sabaragamuwa Province',
          'Gampaha' => 'Western Province',
          'Kalutara' => 'Western Province',
          'Kurunegala' => 'North Western Province',
          'Ratnapura' => 'Sabaragamuwa Province',
          'Polonnaruwa' => 'North Central Province',
          'Anuradhapura' => 'North Central Province',
          'Monaragala' => 'Uva Province',
          'Hambantota' => 'Southern Province',
          'Matara' => 'Southern Province'
        ];
        
        // Get filter parameters
        $activeCategory = request('category'); // This is the event category (Competition, Meetup, etc.)
        $location = request('location');
        $dateFilter = request('date_filter');
        $eventType = request('type'); // This is Online/Physical event type
        
        // Apply filters if any are set
        if ($activeCategory || $location || $dateFilter || $eventType) {
            // Filter by category
            if ($activeCategory) {
                $events = $events->filter(function($event) use ($activeCategory) {
                    return $event->category === $activeCategory;
                });
            }
            
            // Filter by location
            if ($location) {
                $events = $events->filter(function($event) use ($location) {
                    return $event->venue && str_contains(strtolower($event->venue), strtolower($location));
                });
            }
            
            // Filter by date range
            if ($dateFilter) {
                $events = $events->filter(function($event) use ($dateFilter, $today) {
                    $eventDate = Carbon::parse($event->date)->startOfDay();
                    
                    switch ($dateFilter) {
                        case 'today':
                            return $eventDate->isSameDay($today);
                        case 'tomorrow':
                            return $eventDate->isSameDay($today->copy()->addDay());
                        case 'this_week':
                            return $eventDate->isSameWeek($today);
                        case 'next_week':
                            return $eventDate->isSameWeek($today->copy()->addWeek());
                        case 'this_month':
                            return $eventDate->isSameMonth($today);
                        default:
                            return true;
                    }
                });
            }
            
            // Filter by type (online/physical)
            if ($eventType) {
                $events = $events->filter(function($event) use ($eventType) {
                    return $event->type === $eventType;
                });
            }
            
            // Convert collection back to array for proper pagination if needed
            $events = $events->values();
        }
        
        return view('pages.events.index', compact(
            'events', 
            'eventTypes', 
            'eventLocations', 
            'activeCategory',
            'location',
            'dateFilter',
            'eventType',
            'join_form'
        ));
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
        // For testing with mock data
        //$mockEvents = $this->getMockEvents();
        //$event = $mockEvents->firstWhere('id', (int)$id);
        $event = Event::findOrFail($id);

        if (!$event) {
            abort(404, 'Event not found');
        }
        
        // When ready for production, uncomment this and comment out the mock data above
        //$event = Event::findOrFail($id);
        
        return view('pages.events.show', compact('event'));
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
    
    /**
     * Generate mock events data for testing
     * This method simulates data coming from the database with proper field names
     */
    private function getMockEvents()
    {
        $events = [
            (object) [
                'id' => 1,
                'name' => 'Community Clean-up Drive',
                'description' => 'Join us for a day of cleaning up local parks and streets to make our community more beautiful.',
                'date' => now()->addDays(10),
                'time' => '9:00 AM - 1:00 PM',
                'venue' => 'Central Park, Colombo',
                'image_url' => 'images/events/default-event.jpg',
                'category' => 'Event',
                'type' => 'Physical',
                'reference_links' => json_encode(['https://example.com/event1']),
                'link' => 'https://example.com/register1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            (object) [
                'id' => 2,
                'name' => 'Educational Workshop',
                'description' => 'A workshop focused on teaching basic literacy skills to underserved communities.',
                'date' => now()->addDays(3),
                'time' => '10:00 AM - 12:00 PM',
                'venue' => 'Community Center, Kandy',
                'image_url' => 'images/events/default-event.jpg',
                'category' => 'Class',
                'type' => 'Online',
                'reference_links' => json_encode(['https://example.com/workshop1']),
                'link' => 'https://example.com/register2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            (object) [
                'id' => 3,
                'name' => 'Fundraising Gala',
                'description' => 'An elegant evening to raise funds for our community initiatives and projects.',
                'date' => now()->addDays(25),
                'time' => '7:00 PM - 10:00 PM',
                'venue' => 'Grand Hotel, Colombo',
                'image_url' => 'images/events/default-event.jpg',
                'category' => 'Meetup',
                'type' => 'Physical',
                'reference_links' => json_encode(['https://example.com/gala1']),
                'link' => 'https://example.com/register3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            (object) [
                'id' => 4,
                'name' => 'Coding Challenge',
                'description' => 'A programming competition for youth to showcase their skills and win prizes.',
                'date' => now()->addDays(5),
                'time' => '9:00 AM - 5:00 PM',
                'venue' => 'Tech Hub, Galle',
                'image_url' => 'images/events/default-event.jpg',
                'category' => 'Competition',
                'type' => 'Online',
                'reference_links' => json_encode(['https://example.com/coding1']),
                'link' => 'https://example.com/register4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            (object) [
                'id' => 5,
                'name' => 'Community Gathering',
                'description' => 'Monthly community meeting to discuss local initiatives and volunteer opportunities.',
                'date' => now()->addDays(15),
                'time' => '3:00 PM - 5:00 PM',
                'venue' => 'Community Hall, Jaffna',
                'image_url' => 'images/events/default-event.jpg',
                'category' => 'Meetup',
                'type' => 'Physical',
                'reference_links' => json_encode(['https://example.com/meeting1']),
                'link' => 'https://example.com/register5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            (object) [
                'id' => 6,
                'name' => 'Digital Literacy Workshop',
                'description' => 'Learn basic computer skills to enhance employability and access to online resources.',
                'date' => now()->addDays(2),
                'time' => '1:00 PM - 4:00 PM',
                'venue' => 'Public Library, Colombo',
                'image_url' => 'images/events/default-event.jpg',
                'category' => 'Class',
                'type' => 'Online',
                'reference_links' => json_encode(['https://example.com/workshop2']),
                'link' => 'https://example.com/register6',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        
        // Convert to collection for consistency with Eloquent results
        return collect($events);
    }
}
