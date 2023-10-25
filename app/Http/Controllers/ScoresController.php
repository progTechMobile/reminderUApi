<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Score;
use App\Models\User;

class ScoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $scores =Score::all();
        return response()->json(['users' => $scores]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function ShowScoreUserId(string $id )
    {
        $ScoresUsuario= User:: find ($id);
        if (!$ScoresUsuario){
            return response()->json(['message' => 'No existe el usuario'], 404);
        }
        $Scores= $ScoresUsuario -> Scores ;
        return response()->json(['users' => $Scores]);

    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $scores =new Score();
        $scores -> subject_id = $request -> subject_id ;
        $scores -> score = $request -> score;
        $scores -> percent = $request -> percent;
        $scores -> date = $request -> date;
        $scores -> description = $request -> description;
        $scores -> status = $request ->status ;
        $scores -> user_id = $request -> user_id;
        $scores -> save() ;
        return $scores;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $scores = Score::find($id);
        return response()->json(['users' => $scores]);
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $scores = Score::find($id);
        return response()->json(['users' => $scores]);
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
