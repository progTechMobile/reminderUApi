<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeacherRating;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $teach = TeacherRating::all();
        return $teach;
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
        $teach = new TeacherRating();
        $teach -> full_name =$request -> full_name ;
        $teach -> obsaervation =$request ->observation ;
        $teach -> score =$request -> score ;
        $teach -> subject_id =$request -> subject_id;
        $teach -> email =$request -> email ;
        $teach -> save();
        return $teach ;
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
        $teach=TeacherRating::find($id);
        $teach -> full_name =$request -> full_name ;
        $teach -> obsaervation =$request ->observation ;
        $teach -> score =$request -> score ;
        $teach -> subject_id =$request -> subject_id;
        $teach -> email =$request -> email ;
        $teach -> save();
        return $teach ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $teach = TeacherRating::find($id);
        $teach -> save();
        return $teach ;
    }
}
