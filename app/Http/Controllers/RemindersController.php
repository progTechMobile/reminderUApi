<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reminder;

class RemindersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $reminders=Reminder::all();
        return $reminders;
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
        $reminders=new Reminder();
        $reminders -> name =$request -> name ;
        $reminders -> description =$request ->description ;
        $reminders -> creation_date =$request ->creation_date ;
        $reminders -> notification_date =$request ->notification_date ;
        $reminders -> type =$request ->type ;
        $reminders -> status =$request ->status ;
        $reminders -> subject_id =$request ->subject_id ;
        $reminders -> user_id =$request ->user_id ;
        $reminders -> save ();
        return $reminders;
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
        $reminders = Reminder::find($id);
        $reminders -> name =$request -> name ;
        $reminders -> description =$request ->description ;
        $reminders -> creation_date =$request ->creation_date ;
        $reminders -> notification_date =$request ->notification_date ;
        $reminders -> type =$request ->type ;
        $reminders -> status =$request ->status ;
        $reminders -> subject_id =$request ->subject_id ;
        $reminders -> user_id =$request ->user_id ;
        $reminders -> save ();
        return $reminders;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $reminders = Reminder::find($id);
        $reminders -> delete();
        return $reminders;
    }
}