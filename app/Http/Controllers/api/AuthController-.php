<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
   
    public function login(Request $request){
        // Utiliser la règle de validation personnalisée Login
        $validator=Validator::make($request->all(), [
            'login' => 'required|string|login',
            'password' => 'required|string|min:8',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }  
        
        // Authentifier l'utilisateur (logique d'authentification à implémenter)
        $user = User::where('email', $request->input('login'))->first();
        if (!$user || !Hash::check($request->input('password'), $user->password)) {
            return response()->json(['message' => 'Identifiants invalides'], 401);
        }else{
            // Générer un token d'authentification ou effectuer d'autres actions nécessaires
            // $user->createToken('auth_token')->plainTextToken;
            $token = $user->createToken('auth_token')->plainTextToken;
            return response()->json(['message' => 'Authentification réussie', 'token' => $token], 200);
        }
    }

    public function register(Request $request){
        // Logique d'enregistrement (à implémenter)
        $validator=Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

    }

    public function logout():void
    {
        // Logique de déconnexion (à implémenter)

    }


}
