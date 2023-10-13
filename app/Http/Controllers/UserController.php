<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::all();
        return $users;
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
        $users = new User();
        $users -> name = $request -> name ; 
        $users -> last_name = $request -> last_name ; 
        $users -> email_u = $request -> email_u ; 
        $users -> password = $request -> password ; 
        $users -> status = $request -> status ; 
        $users ->  save();
        return $users;
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
        $users = User::find($id);
        $users -> name = $request -> name ; 
        $users -> last_name = $request -> last_name ; 
        $users -> email_u = $request -> email_u ; 
        $users -> password = $request -> password ; 
        $users -> status = $request -> status ; 
        $users ->  save();
        return $users;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $users = User::find($id);
        $users -> delete();
        return $users;
    }
}
