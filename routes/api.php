<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\AuthController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Routes API minimalistes et organisées par version.
| Ajoutez vos controllers dans App\Http\Controllers\Api\...
|
*/

// Public routes without authentication
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

// Protected routes (ex. Sanctum)
Route::middleware('auth:sanctum')->group(function () {
    // Add your protected routes here
});

Route::get('/test', [AuthController::class, 'test']);

// Fallback pour les routes API non trouvées
Route::fallback(function () {
    return response()->json(['message' => 'Route API introuvable.'], 404);
});