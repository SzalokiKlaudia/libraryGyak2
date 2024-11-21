<?php

use App\Http\Controllers\LendingController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



//User végpontok,  API útvonalak (routes) definiálása
Route::get('/users', [UserController::class, 'index']); //Az összes felhasználó adatainak lekérése
Route::get('/users/{id}', [UserController::class, 'show']); // Egy adott felhasználó adatainak lekérése az id alapján.
Route::post('/users', [UserController::class, 'store']);    //Új felhasználó létrehozása.
Route::put('/users/{id}', [UserController::class, 'update']);   //Egy adott felhasználó adatainak teljes frissítése az id alapján.
Route::delete('/users/{id}', [UserController::class, 'destroy']);   //Egy adott felhasználó törlése az id alapján.


//Lending végpontok készítése
Route::get('/lendings', [LendingController::class, 'index']);
Route::get('/lendings/{user_id}/{copy_id}/{start}', [LendingController::class, 'show']);
Route::post('/lendings', [LendingController::class, 'store']);
//Route::put('/users/{id}', [LendingController::class, 'update']);
Route::delete('/lendings/{user_id}/{copy_id}/{start}', [LendingController::class, 'destroy']);