<?php

use App\Http\Controllers\Api\SetupScriptController;
use App\Http\Controllers\Api\TodolistController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


/***
 * For REST Api and OpenApi/SWAGGER purposes With Santum authentication sample
 * CREATE TOKEN USING SANCTUM TO ACCESS TODOS IN POSTMAN WITH AUTHENTICATION
 * php artisan tinker
 * $user = User::first();
 * $user->createToken('user-access);
 * see password-access-token in db after creating
 * 
 */

// Route::get('/todolists', [TodoListController::class, 'index'])->name('todolists')->middleware('auth:sanctum');
// Route::get('/todolists/{id}',[TodoListController::class, 'show'])->name('todolists');
// Route::post('/todolists/create',[TodoListController::class, 'store'])->name('todolists/create'); 
// Route::put('/todolists/{id}',[TodoListController::class, 'update'])->name('todolists');
// Route::delete('/todolists/{id}',[TodoListController::class, 'destroy'])->name('todolists');
Route::apiResource('todolists', TodolistController::class);   





Route::get('scriptsetup',[SetupScriptController::class, 'index'])->name('scriptsetup');

