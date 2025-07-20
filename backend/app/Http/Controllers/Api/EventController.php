<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::where('is_active', true)
            ->orderBy('start_date', 'asc')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $events
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'registration_deadline' => 'required|date|before:start_date',
            'max_participants' => 'required|integer|min:1',
            'entry_fee' => 'required|numeric|min:0',
            'event_type' => 'required|in:competition,workshop,seminar,hackathon',
            'prizes' => 'nullable|array',
            'requirements' => 'nullable|array',
            'is_team_based' => 'boolean',
            'is_active' => 'boolean'
        ]);

        $event = Event::create($validated);

        return response()->json([
            'success' => true,
            'data' => $event
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Event::find($id);

        if (!$event) {
            return response()->json([
                'success' => false,
                'message' => 'Event not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $event
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $event = Event::find($id);

        if (!$event) {
            return response()->json([
                'success' => false,
                'message' => 'Event not found'
            ], 404);
        }

        $validated = $request->validate([
            'name' => 'string|max:255',
            'description' => 'string',
            'location' => 'string|max:255',
            'start_date' => 'date',
            'end_date' => 'date|after:start_date',
            'registration_deadline' => 'date|before:start_date',
            'max_participants' => 'integer|min:1',
            'entry_fee' => 'numeric|min:0',
            'event_type' => 'in:competition,workshop,seminar,hackathon',
            'prizes' => 'nullable|array',
            'requirements' => 'nullable|array',
            'is_team_based' => 'boolean',
            'is_active' => 'boolean'
        ]);

        $event->update($validated);

        return response()->json([
            'success' => true,
            'data' => $event
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::find($id);

        if (!$event) {
            return response()->json([
                'success' => false,
                'message' => 'Event not found'
            ], 404);
        }

        $event->delete();

        return response()->json([
            'success' => true,
            'message' => 'Event deleted successfully'
        ]);
    }
}
