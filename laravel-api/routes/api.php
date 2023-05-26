<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeopleController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('Wilamowski/51058/people', [\App\Http\Controllers\PeopleController::class, 'index']);
Route::post('Wilamowski/51058/people', [\App\Http\Controllers\PeopleController::class, 'store']);
Route::get('Wilamowski/51058/people/{id}', [\App\Http\Controllers\PeopleController::class, 'show']);
Route::put('Wilamowski/51058/people/{id}/edit', [\App\Http\Controllers\PeopleController::class, 'update']);
Route::delete('Wilamowski/51058/people/{id}/delete', [\App\Http\Controllers\PeopleController::class, 'delete']);



