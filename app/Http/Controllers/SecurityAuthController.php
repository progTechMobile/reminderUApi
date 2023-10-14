<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SecurityAuthController extends Controller
{
    public function login(Request $request)
    {
        // Validación de datos
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        // Credenciales para autenticar al usuario
        $credentials = request(['email', 'password']);
        
        // Verificamos las credenciales del usuario
        if (!Auth::attempt($credentials)) {
            // Retornamos un mensaje de error
            return response()->json([
                'token' => null
            ], 401);
        }
        // Si las credenciales son correctas, generamos un token para el usuario
        $user = $request->user();
        $token = $user->createToken('authToken')->plainTextToken;
        // Retornamos solo el token en formato de texto plano
        return response()->json([
            'token' => $token
        ], 200);
    }

    public function logout(Request $request)
    {
        // Revocar el token de autenticación del usuario actual
        $request->user()->tokens->each(function ($token, $key) {
            $token->delete();
        });

        // Retornar una respuesta exitosa
        return response()->json([
            'message' => 'Sesión cerrada exitosamente'
        ], 200);
    }

    public function getRoleNameById(Request $request, $role_id)
    {
        $role = Role::find($role_id);
        return response()->json([
            'role_name' => $role->name
        ], 200);
    
    }
    public function roles(Request $request)
    {
        $roles = Role::whereNot('status','perpetual')->get();
        return $roles;
    
    }
}
