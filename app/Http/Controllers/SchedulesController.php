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
        $schedule=Schedule::all();
        return $schedule;
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
        $schedule =new Schedule();
        $schedule -> semester = $request -> semester ;
        $schedule -> day = $request -> day;
        $schedule -> timestart = $request -> timestar;
        $schedule -> timeend = $request -> timeend;
        $schedule -> Subject_id = $request -> subject_id;
        $schedule -> block = $request ->block ;
        $schedule -> classroom = $request -> classroom;
        $schedule -> save() ;
        return $schedule;
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
        $schedule = Schedule::find($id);
        $schedule -> semester = $request -> semester ;
        $schedule -> day = $request -> day;
        $schedule -> timestart = $request -> timestar;
        $schedule -> timeend = $request -> timeend;
        $schedule -> Subject_id = $request -> subject_id;
        $schedule -> block = $request ->block ;
        $schedule -> classroom = $request -> classroom;
        $schedule -> save() ;
        return $schedule;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $schedule = Schedule::find($id);
        $schedule -> delete();
        return $schedule;
    }
}
