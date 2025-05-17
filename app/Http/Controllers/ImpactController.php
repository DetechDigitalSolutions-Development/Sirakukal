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
        $eventCount = Event::count(); // Total number of events
        $volunteersCount = Volunteer::count();
        $story = Story::all();
        $join_form = SiteSetting::where('key','=','join_form_enabled');

        return view('pages.impact', compact('story','join_form','eventCount','volunteersCount'));
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
