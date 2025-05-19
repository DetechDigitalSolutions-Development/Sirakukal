<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutusController;
use App\Http\Controllers\AimController;
use App\Http\Controllers\ImpactController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\ContactController;

/**
 * Mock Data - Centralized for consistency
 */


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
            // Fields matching the Testimonial model: 'author', 'description', 'image_url'
            'author' => 'Sarah Chan',
            'author_title' => 'Volunteer from UK', // Additional field for UI display
            'description' => 'Volunteering in Sri Lanka was a life-changing experience. The local community welcomed us warmly, and seeing the direct impact of our work was incredibly rewarding. Highly recommend!',
            'image_url' => asset('images/impact-1.png'),
            
            // Keep legacy fields for backward compatibility
            'name' => 'Sarah Chan',
            'title' => 'Volunteer from UK',
            'content' => 'Volunteering in Sri Lanka was a life-changing experience. The local community welcomed us warmly, and seeing the direct impact of our work was incredibly rewarding. Highly recommend!',
            'image' => asset('images/impact-1.png'),
        ],
        [
            // Fields matching the Testimonial model: 'author', 'description', 'image_url'
            'author' => 'Omar Hassan',
            'author_title' => 'Volunteer from Egypt', // Additional field for UI display
            'description' => 'The team organized everything seamlessly. I felt safe and supported throughout my stay. Working on the education project gave me a new perspective on global challenges and the power of collective action.',
            'image_url' => asset('images/impact-2.jpg'),
            
            // Keep legacy fields for backward compatibility
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
            'mode' => 'physical',
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
            'mode' => 'online',
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
            'mode' => 'physical',
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
            'mode' => 'online',
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
            'mode' => 'physical',
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
            'mode' => 'online',
        ],
    ];
}

function getMockVolunteer($nic = null)
{
    return (object) [
        'volunteer_id' => 'VOL-' . rand(100000, 999999),
        'full_name' => 'John Doe',
        'initials_name' => 'J. Doe',
        'district' => 'Colombo',
        'address' => '123 Main Street, Colombo 05',
        'nic_number' => $nic ?? '123456789V',
        'date_of_birth' => now()->subYears(25)->format('Y-m-d'),
        'joined_date' => now()->subMonths(2)->format('Y-m-d'),
        'status' => 'Active',
        'institution' => 'University of Colombo',
        'email' => 'john.doe@example.com',
        'phone' => '+94 77 1234567',
        'whatsapp' => '+94 77 1234567',
        'referred_by' => 'social_media',
        'reason_to_join' => 'I want to contribute to community development',
        'joined' => 'yes',
        'created_at' => now()->subMonths(3)
    ];
}
/**
 * Main Pages Routes
 */
// Route::get('/', function () {
//     $events = getMockEvents();
//     $impactStats = getMockImpactStats();
//     $testimonials = getMockTestimonials();
//     return view('pages.home', compact('events', 'impactStats', 'testimonials'));
// })->name('home');



// Route::get('/about', function () {
//     return view('pages.about');
// })->name('about');

// Route::get('/aim', function () {
//     return view('pages.aim');
// })->name('aim');

// Route::get('/impact', function () {
//     $impactStats = getMockImpactStats();
//     return view('pages.impact', compact('impactStats'));
// })->name('impact');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutusController::class, 'index'])->name('about');
Route::get('/events', [EventsController::class, 'index'])->name('event');
Route::get('/aim', [AimController::class, 'index'])->name('aim');
Route::get('/impact', [ImpactController::class, 'index'])->name('impact');
Route::post('/contact-submit', [ContactController::class, 'submit'])->name('contact.submit');

Route::prefix('volunteers')->group(function () {
    Route::get('/volunteer', [VolunteerController::class, 'create'])->name('volunteers.volunteer');
    Route::post('/', [VolunteerController::class, 'store'])->name('volunteers.store');
});
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
        $mode = request('mode');
        
        // Apply filters
        if ($activeType || $location || $dateFilter || $mode) {
            $filteredEvents = array_filter($events, function($event) use ($activeType, $location, $dateFilter, $mode) {
                $matchesType = !$activeType || $event->type === $activeType;
                $matchesLocation = !$location || $event->city === $location;
                $matchesMode = !$mode || $event->mode === $mode;
                
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
                
                return $matchesType && $matchesLocation && $matchesDate && $matchesMode;
            });
            
            $events = array_values($filteredEvents);
        }
        
        return view('pages.events.index', compact(
            'events', 
            'eventTypes', 
            'eventLocations', 
            'activeType',
            'location',
            'dateFilter',
            'mode'
        ));
    })->name('index');
    
    // Show individual event details
    Route::get('/{id}', function ($id) {
        $events = getMockEvents();
        $event = null;
        
        // Find the event with the given ID
        foreach ($events as $mockEvent) {
            if ($mockEvent->id == $id) {
                $event = $mockEvent;
                break;
            }
        }
        
        // If event not found, redirect to events listing
        if (!$event) {
            return redirect()->route('events.index');
        }
        
        // Simplified mock data with only necessary fields
        $event->name = $event->title;
        $event->time = '10:00 AM - 3:00 PM';
        $event->venue = $event->location . ', ' . $event->city;
        // Note: date and description are already part of the event object
        // image_url is also already part of the event object
        
        return view('pages.events.show', compact('event'));
    })->name('show');
});

/**
 * Volunteer Routes
 */
// Route::prefix('volunteers')->name('volunteers.')->group(function () {
//     // Main volunteer portal page
//     Route::get('/volunteer', function () {
//         return view('pages.volunteers.volunteer');
//     })->name('volunteer');
    
//     // Keep original register route for backward compatibility
//     Route::get('/register', function () {
//         return view('pages.volunteers.volunteer');
//     })->name('register');
    
//     // Handle form submissions
//     Route::post('/volunteer', function () {
//         // In a real application, we would validate and store the volunteer
//         // Since this is mock data, we'll just create a success message
//         // and ensure we're accessing all the fields from the form
//         $requiredFields = [
//             'full_name', 'initials_name', 'district', 'address', 'nic_number',
//             'date_of_birth', 'phone', 'email', 'referred_by', 'reason_to_join'
//         ];
        
//         // Check if all required fields are present
//         foreach ($requiredFields as $field) {
//             if (!request()->has($field)) {
//                 return redirect()->back()->withErrors([
//                     $field => 'The ' . str_replace('_', ' ', $field) . ' field is required.'
//                 ])->withInput();
//             }
//         }
        
//         // Check NIC format (old 9 digits + V/X or new 12 digits)
//         $nic = request('nic_number');
//         $validNic = (preg_match('/^\d{9}[VvXx]$/', $nic) || preg_match('/^\d{12}$/', $nic));
        
//         if (!$validNic) {
//             return redirect()->back()->withErrors([
//                 'nic_number' => 'Please enter a valid NIC number (9 digits + V/X or 12 digits).'
//             ])->withInput();
//         }
        
//         // Mock volunteer creation - in a real app this would be saved to database
//         $volunteer = getMockVolunteer(request('nic_number'));
        
//         return redirect()->back()->with([
//             'success' => 'Your volunteer registration has been submitted successfully. Thank you!',
//             'volunteer' => $volunteer
//         ]);
//     })->name('volunteer.store');
    
//     Route::post('/register', function () {
//         // Redirect to the main volunteer handler
//         return redirect()->route('volunteers.volunteer.store', request()->all());
//     })->name('store');
    
//     // Volunteer search routes
//     Route::get('/search', function () {
//         // Handle both name and NIC search with mock data
//         $volunteer = null;
//         $name = request('name');
//         $nic = request('nic');
        
//         if ($name || $nic) {
//             // Get mock volunteer with custom data based on search inputs
//             $volunteer = (object) [
//                 'id' => 'VOL-123456',
//                 'name' => $name ?: 'John Doe',
//                 'nic' => $nic ?: '123456789V',
//                 'phone' => '+94 77 1234567',
//                 'email' => 'john.doe@example.com',
//                 'registration_date' => now()->subMonths(2),
//                 'created_at' => now()->subMonths(3),
//                 'status' => 'Active'
//             ];
//         }
        
//         return view('pages.volunteers.search', [
//             'volunteer' => $volunteer
//         ]);
//     })->name('search');
    
//     Route::get('/verify', function () {
//         $nic = request('nic');
//         $volunteer = null;
        
//         if ($nic) {
//             $volunteer = getMockVolunteer($nic);
//         }
        
//         if (request()->wantsJson()) {
//             return response()->json(['volunteer' => $volunteer]);
//         }
        
//         return view('pages.volunteers.volunteer', [
//             'volunteer' => $volunteer,
//             'activeTab' => 'verify'
//         ]);
//     })->name('verify');
    
//     Route::post('/search', function () {
//         $volunteer = getMockVolunteer();
//         return redirect()->back()->with('volunteer', $volunteer);
//     })->name('search.submit');
// });

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
