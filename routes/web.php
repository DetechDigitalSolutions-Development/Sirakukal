<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\EventController;

/**
 * Mock Data - Centralized for consistency
 */
function getMockEvent($id = 1)
{
    return (object) [
        'id' => $id,
        'title' => 'Community Clean-up Drive',
        'description' => 'Join us for a day of cleaning up local parks and streets to make our community more beautiful.',
        'date' => now()->addDays(10),
        'location' => 'Central Park, Main Street',
        'type' => 'Events',
        'image_url' => asset('images/events/default-event.jpg'),
    ];
}

function getMockImpactStats()
{
    return [
        'volunteers' => '1,500+',
        'hours' => '25,000+',
        'communities' => '20+',
        'events' => '120'
    ];
}

function getMockTestimonials()
{
    return [
        [
            'name' => 'Sarah Chan',
            'title' => 'Volunteer from UK',
            'content' => 'Volunteering in Sri Lanka was a life-changing experience. The local community welcomed us warmly, and seeing the direct impact of our work was incredibly rewarding. Highly recommend!',
            'image' => asset('images/impact-1.png'),
        ],
        [
            'name' => 'Omar Hassan',
            'title' => 'Volunteer from Egypt',
            'content' => 'The team organized everything seamlessly. I felt safe and supported throughout my stay. Working on the education project gave me a new perspective on global challenges and the power of collective action.',
            'image' => asset('images/impact-2.jpg'),
        ],
    ];
}

function getMockEvents()
{
    return [
        (object) [
            'id' => 1,
            'title' => 'Community Clean-up Drive',
            'description' => 'Join us for a day of cleaning up local parks and streets to make our community more beautiful.',
            'date' => now()->addDays(10),
            'location' => 'Central Park',
            'city' => 'Colombo',
            'district' => 'Western Province',
            'type' => 'Events',
            'image_url' => asset('images/events/default-event.jpg'),
        ],
        (object) [
            'id' => 2,
            'title' => 'Educational Workshop',
            'description' => 'A workshop focused on teaching basic literacy skills to underserved communities.',
            'date' => now()->addDays(3),
            'location' => 'Community Center',
            'city' => 'Kandy',
            'district' => 'Central Province',
            'type' => 'Classes',
            'image_url' => asset('images/events/default-event.jpg'),
        ],
        (object) [
            'id' => 3,
            'title' => 'Fundraising Gala',
            'description' => 'An elegant evening to raise funds for our community initiatives and projects.',
            'date' => now()->addDays(25),
            'location' => 'Grand Hotel',
            'city' => 'Colombo',
            'district' => 'Western Province',
            'type' => 'Meetups',
            'image_url' => asset('images/events/default-event.jpg'),
        ],
        (object) [
            'id' => 4,
            'title' => 'Coding Challenge',
            'description' => 'A programming competition for youth to showcase their skills and win prizes.',
            'date' => now()->addDays(5),
            'location' => 'Tech Hub',
            'city' => 'Galle',
            'district' => 'Southern Province',
            'type' => 'Competition',
            'image_url' => asset('images/events/default-event.jpg'),
        ],
        (object) [
            'id' => 5,
            'title' => 'Community Gathering',
            'description' => 'Monthly community meeting to discuss local initiatives and volunteer opportunities.',
            'date' => now()->addDays(15),
            'location' => 'Community Hall',
            'city' => 'Jaffna',
            'district' => 'Northern Province',
            'type' => 'Meetups',
            'image_url' => asset('images/events/default-event.jpg'),
        ],
        (object) [
            'id' => 6,
            'title' => 'Digital Literacy Workshop',
            'description' => 'Learn basic computer skills to enhance employability and access to online resources.',
            'date' => now()->addDays(2),
            'location' => 'Public Library',
            'city' => 'Colombo',
            'district' => 'Western Province',
            'type' => 'Classes',
            'image_url' => asset('images/events/default-event.jpg'),
        ],
    ];
}

function getMockVolunteer($nic = null)
{
    return (object) [
        'id' => 'VOL-123456',
        'name' => 'John Doe',
        'nic' => $nic ?? '123456789V',
        'phone' => '+94 77 1234567',
        'email' => 'john.doe@example.com',
        'registration_date' => now()->subMonths(2),
        'created_at' => now()->subMonths(3),
        'status' => 'Active'
    ];
}
/**
 * Main Pages Routes
 */
Route::get('/', function () {
    $events = getMockEvents();
    $impactStats = getMockImpactStats();
    $testimonials = getMockTestimonials();
    return view('pages.home', compact('events', 'impactStats', 'testimonials'));
})->name('home');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/aim', function () {
    return view('pages.aim');
})->name('aim');

Route::get('/impact', function () {
    $impactStats = getMockImpactStats();
    return view('pages.impact', compact('impactStats'));
})->name('impact');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');
/**
 * Events Routes
 */
Route::prefix('events')->name('events.')->group(function () {
    Route::get('/', function () {
        $events = getMockEvents();
        $eventTypes = ['Competition', 'Meetups', 'Events', 'Classes'];
        $eventLocations = [
            'Colombo' => 'Western Province',
            'Kandy' => 'Central Province', 
            'Galle' => 'Southern Province',
            'Jaffna' => 'Northern Province'
        ];
        
        // Get filter parameters
        $activeType = request('type');
        $location = request('location');
        $dateFilter = request('date_filter');
        
        // Apply filters
        if ($activeType || $location || $dateFilter) {
            $filteredEvents = array_filter($events, function($event) use ($activeType, $location, $dateFilter) {
                $matchesType = !$activeType || $event->type === $activeType;
                $matchesLocation = !$location || $event->city === $location;
                
                // Handle date filter
                $matchesDate = true;
                if ($dateFilter) {
                    $today = now()->startOfDay();
                    $eventDate = $event->date->startOfDay();
                    
                    switch ($dateFilter) {
                        case 'today':
                            $matchesDate = $eventDate->isSameDay($today);
                            break;
                        case 'tomorrow':
                            $matchesDate = $eventDate->isSameDay($today->copy()->addDay());
                            break;
                        case 'this_week':
                            $matchesDate = $eventDate->isSameWeek($today);
                            break;
                        case 'next_week':
                            $matchesDate = $eventDate->isSameWeek($today->copy()->addWeek());
                            break;
                        case 'this_month':
                            $matchesDate = $eventDate->isSameMonth($today);
                            break;
                    }
                }
                
                return $matchesType && $matchesLocation && $matchesDate;
            });
            
            $events = array_values($filteredEvents);
        }
        
        return view('pages.events.index', compact(
            'events', 
            'eventTypes', 
            'eventLocations', 
            'activeType',
            'location',
            'dateFilter'
        ));
    })->name('index');
    
    Route::get('/{id}', function ($id) {
        $event = getMockEvent($id);
        return view('pages.events.show', compact('event'));
    })->name('show');
});

/**
 * Volunteer Routes
 */
Route::prefix('volunteers')->name('volunteers.')->group(function () {
    // Main volunteer portal page
    Route::get('/volunteer', function () {
        return view('pages.volunteers.volunteer');
    })->name('volunteer');
    
    // Keep original register route for backward compatibility
    Route::get('/register', function () {
        return view('pages.volunteers.volunteer');
    })->name('register');
    
    // Handle form submissions
    Route::post('/volunteer', function () {
        return redirect()->back()->with('success', 'Your volunteer registration has been submitted. Thank you!');
    })->name('volunteer.store');
    
    Route::post('/register', function () {
        return redirect()->back()->with('success', 'Your volunteer registration has been submitted. Thank you!');
    })->name('store');
    
    // Volunteer search routes
    Route::get('/search', function () {
        // Handle both name and NIC search with mock data
        $volunteer = null;
        $name = request('name');
        $nic = request('nic');
        
        if ($name || $nic) {
            // Get mock volunteer with custom data based on search inputs
            $volunteer = (object) [
                'id' => 'VOL-123456',
                'name' => $name ?: 'John Doe',
                'nic' => $nic ?: '123456789V',
                'phone' => '+94 77 1234567',
                'email' => 'john.doe@example.com',
                'registration_date' => now()->subMonths(2),
                'created_at' => now()->subMonths(3),
                'status' => 'Active'
            ];
        }
        
        return view('pages.volunteers.search', [
            'volunteer' => $volunteer
        ]);
    })->name('search');
    
    Route::get('/verify', function () {
        $nic = request('nic');
        $volunteer = null;
        
        if ($nic) {
            $volunteer = getMockVolunteer($nic);
        }
        
        if (request()->wantsJson()) {
            return response()->json(['volunteer' => $volunteer]);
        }
        
        return view('pages.volunteers.volunteer', [
            'volunteer' => $volunteer,
            'activeTab' => 'verify'
        ]);
    })->name('verify');
    
    Route::post('/search', function () {
        $volunteer = getMockVolunteer();
        return redirect()->back()->with('volunteer', $volunteer);
    })->name('search.submit');
});

// Legacy route for compatibility
Route::get('/volunteer/search', function () {
    return redirect()->route('volunteers.verify', request()->query());
})->name('volunteer.search');

/* // Localization routes
Route::get('/set-locale/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'ta', 'si'])) {
        session(['locale' => $locale]);
        App::setLocale($locale);
    }
    return back(); // Redirect back
}); */
