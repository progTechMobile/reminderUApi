<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $subjects = Subject::all();
        return response()->json(['users' => $subjects]);
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
        $subjects = new Subject();
        $subjects -> name = $request -> name ; 
        $subjects -> credits = $request -> credits ; 
        $subjects -> description = $request -> description ; 
        $subjects -> user_id = $request -> user_id ; 
        $subjects -> code = $request -> code ; 
        $subjects ->  save();
        return $subjects;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $subjects = Subject::find($id);
        return response()->json(['users' => $subjects]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $subjects = Subject::find($id);
        return response()->json(['users' => $subjects]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $subjects = Subject::find($id);
        $subjects -> name = $request -> name ; 
        $subjects -> credits = $request -> credits ; 
        $subjects -> description = $request -> description ; 
        $subjects -> user_id = $request -> user_id ; 
        $subjects -> code = $request -> code ; 
        $subjects ->  save();
        return $subjects;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $subjects = Subject::find($id);
        $subjects -> delete();
        return $subjects;
    }
}
