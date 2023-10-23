<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;

class SchedulesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $schedules=Schedule::all();
        return response()->json(['users' => $schedules]);
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
        $schedules =new Schedule();
        $schedules -> semester = $request -> semester ;
        $schedules -> day = $request -> day;
        $schedules -> timestart = $request -> timestar;
        $schedules -> timeend = $request -> timeend;
        $schedules -> Subject_id = $request -> subject_id;
        $schedules -> block = $request ->block ;
        $schedules -> classroom = $request -> classroom;
        $schedules -> save() ;
        return $schedules;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $schedules = Schedule::find($id);
        return response()->json(['users' => $schedules]); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $schedules = Schedule::find($id);
        return response()->json(['users' => $schedules]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $schedules = Schedule::find($id);
        $schedules -> semester = $request -> semester ;
        $schedules -> day = $request -> day;
        $schedules -> timestart = $request -> timestar;
        $schedules -> timeend = $request -> timeend;
        $schedules -> Subject_id = $request -> subject_id;
        $schedules -> block = $request ->block ;
        $schedules -> classroom = $request -> classroom;
        $schedules -> save() ;
        return $schedules;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $schedules = Schedule::find($id);
        $schedules -> delete();
        return $schedules;
    }
}
