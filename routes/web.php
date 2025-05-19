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
// Remove this route since we're using the prefixed group below
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
    // List all events with filtering
    Route::get('/', [EventsController::class, 'index'])->name('index');
    
    // Show individual event details
    Route::get('/{id}', [EventsController::class, 'show'])->name('show');

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

// Volunteer Search Route
Route::get('/volunteer/search', function () {
    $volunteer = \App\Helpers\VolunteerHelper::searchVolunteer(
        request('nic'),
        request('name')
    );
    
    if (request()->ajax()) {
        return response()->json(['volunteer' => $volunteer]);
    }
    
    return view('modals.volunteer-search-modal', [
        'volunteer' => $volunteer,
        'searchPerformed' => true
    ]);
})->name('volunteer.search');

/* Localization routes - Commented out until proper backend setup is ready
Route::get('/set-locale/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'ta', 'si'])) {
        session(['locale' => $locale]);
        app()->setLocale($locale);
    }
    return back(); // Redirect back
})->name('set.locale');
*/
