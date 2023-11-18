<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Role;
class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::all();
        $roles = Role::all();
        return view("users.index", ["users" => $users, "roles" => $roles]);
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
        $users->name = $request->name;
        $users->last_name = $request->last_name;
        $users->email = $request->email;
        $users->password = bcrypt($request->password);
        $users->role_id = $request->role_id;
        $users->save();
        return redirect('/user')->with('success', 'Usuario creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $users = User::find($id);
        return response()->json(['user' => $users]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $users = User::find($id);
        $users->name = $request->name;
        $users->last_name = $request->last_name;
        $users->email = $request->email;
        $users->password = bcrypt($request->password);
        $users->status = $request->status;
        $users->save();
        return redirect('/user')->with('success', 'Usuario actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $users = User::find($id);
        $users->delete();
        return $users;
    }

    public function createPDF(){
        //Recuperar todos los productos de la db
        $datos = User::all();
        $pdf = PDF::loadView('PDF.UsersPDF', compact('datos'));
        return $pdf->download('Lista de Usuarios.pdf');
    }

}