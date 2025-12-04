<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Routes API minimalistes et organisées par version.
| Ajoutez vos controllers dans App\Http\Controllers\Api\...
|
*/

Route::prefix('api')->middleware('throttle:60,1')->group(function () {

    // Routes publiques
   

    // Routes protégées (ex. Sanctum ou autre)
  
});

// Fallback pour les routes API non trouvées
Route::fallback(function () {
    return response()->json(['message' => 'Route API introuvable.'], 404);
});