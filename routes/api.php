<?php

use App\Http\Controllers\AutoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NaptarController;
use App\Http\Controllers\RendelesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Új felhasználó létrehozása
Route::post('/register', [UserController::class,'register']);

Route::post('/login', [UserController::class, 'login']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('/logout', [UserController::class, 'logout']);
});

// Felhasználók listázása
Route::get('/user', [UserController::class, 'index']);
Route::get('/user/{id}', [UserController::class,'show']);

// Felhasználó módosítása
Route::put('/user/{id}', [UserController::class, 'update']);

// Felhasználó törlése
Route::delete('/user/{id}', [UserController::class, 'destroy']);


// ----- CARS ----- //
Route::get('/cars', [AutoController::class, 'pagination']);
Route::get('/cars/{id}', [AutoController::class, 'show']);
Route::get('/carsAll', [AutoController::class, 'index']);

// Autó létrehozása
Route::post('/cars', [AutoController::class, 'store']);


// ----- NAPTÁRAK ----- //
Route::get('/naptar', [NaptarController::class, 'index']);
Route::get('/naptar/{id}', [NaptarController::class,'show']);

// Bérlés kezdetének létrehozása
Route::post('/naptar', [NaptarController::class, 'store']);

// Bérlés lejárta
Route::delete('/naptar/{id}', [NaptarController::class, 'destroy']);


// ----- RENDELÉSEK ----- //
Route::get('/rendeles', [RendelesController::class, 'index']);
Route::get('/rendeles/{id}', [RendelesController::class,'show']);

Route::post('/rendeles', [RendelesController::class,'store']);

Route::put('/rendeles/{id}', [RendelesController::class, 'update']);

Route::delete('/rendeles/{id}', [RendelesController::class, 'destroy']);

