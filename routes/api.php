<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Új felhasználó létrehozása
Route::post('/user', [UserController::class, 'store']);

// Felhasználók listázása
Route::get('/user', [UserController::class, 'index']);
Route::get('/user/{id}', [UserController::class,'show']);

// Felhasználó módosítása
Route::put('/user/{id}', [UserController::class, 'update']);

// Felhasználó törlése
Route::delete('/user/{id}', [UserController::class, 'destroy']);