<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Score;

class ScoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $score =Score::all();
        return $score;

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
        $score =new Score();
        $score -> subject_id = $request -> subject_id ;
        $score -> score = $request -> score;
        $score -> percent = $request -> percent;
        $score -> date = $request -> date;
        $score -> description = $request -> description;
        $score -> status = $request ->status ;
        $score -> user_id = $request -> user_id;
        $score -> save() ;
        return $score;
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
        $score = Score::find($id);
        $score -> subject_id = $request -> subject_id ;
        $score -> score = $request -> score;
        $score -> percent = $request -> percent;
        $score -> date = $request -> date;
        $score -> description = $request -> description;
        $score -> status = $request ->status ;
        $score -> user_id = $request -> user_id;
        $score -> save() ;
        return $score;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $score = Score::find($id);
        $score -> delete();
        return $score;
    }
}
