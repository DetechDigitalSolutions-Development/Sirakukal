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
        $upcomingEvents = Event::where('date', '>=', $today)->orderBy('date')->get();
        $join_form = SiteSetting::where('key','=','join_form_enabled');

        return view('pages.events.index', compact('upcomingEvents','join_form'));
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
