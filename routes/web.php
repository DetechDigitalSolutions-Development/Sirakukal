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
        'image_url' => asset('images/events/default-event.jpg'),
    ];
}

function getMockEvents()
{
    return [
        getMockEvent(1),
        (object) [
            'id' => 2,
            'title' => 'Educational Workshop',
            'description' => 'A workshop focused on teaching basic literacy skills to underserved communities.',
            'date' => now()->addDays(15),
            'location' => 'Community Center, 123 Oak Avenue',
            'image_url' => asset('images/events/default-event.jpg'),
        ],
        (object) [
            'id' => 3,
            'title' => 'Fundraising Gala',
            'description' => 'An elegant evening to raise funds for our community initiatives and projects.',
            'date' => now()->addDays(25),
            'location' => 'Grand Hotel, 456 Maple Road',
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
    return view('pages.home', compact('events'));
})->name('home');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

/**
 * Events Routes
 */
Route::prefix('events')->name('events.')->group(function () {
    Route::get('/', function () {
        $events = getMockEvents();
        $categories = ['Community Service', 'Education', 'Environment', 'Health', 'Youth'];
        
        return view('pages.events.index', compact('events', 'categories'));
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
    
    // Volunteer verification routes
    Route::get('/search', function () {
        return view('pages.volunteers.search');
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
