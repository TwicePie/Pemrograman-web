<?php

namespace App\Http\Controllers;

use App\Models\RaceSchedule;
use Illuminate\Http\Request;

class RaceScheduleController extends Controller
{
    // Display all race schedules
    public function index()
    {
        $schedules = RaceSchedule::all();
        return response()->json($schedules);
    }

    // Store a new race schedule
    public function store(Request $request)
    {
        $request->validate([
            'event_name' => 'required|string',
            'location' => 'required|string',
            'race_date' => 'required|date',
            'participants' => 'nullable|string',
        ]);

        $schedule = RaceSchedule::create($request->all());
        return response()->json($schedule, 201);
    }

    // Show a single race schedule
    public function show($id)
    {
        $schedule = RaceSchedule::find($id);
        if (!$schedule) {
            return response()->json(['message' => 'Schedule not found'], 404);
        }
        return response()->json($schedule);
    }

    // Update a race schedule
    public function update(Request $request, $id)
    {
        $schedule = RaceSchedule::find($id);
        if (!$schedule) {
            return response()->json(['message' => 'Schedule not found'], 404);
        }

        $schedule->update($request->all());
        return response()->json($schedule);
    }

    // Delete a race schedule
    public function destroy($id)
    {
        $schedule = RaceSchedule::find($id);
        if (!$schedule) {
            return response()->json(['message' => 'Schedule not found'], 404);
        }

        $schedule->delete();
        return response()->json(['message' => 'Schedule deleted successfully']);
    }
}
