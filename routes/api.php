<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProfileController;
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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {


    Route::apiResource('/personal-cabinet', \App\Http\Controllers\Cabinets\UserController::class)->only([
        'show', 'update', 'destroy', 'index'
    ]);


    Route::apiResource('/business-profile', \App\Http\Controllers\Cabinets\BusinessController::class)->except([
        'edit', 'create'
    ]);
});


Route::post('/sendimage', [ImageController::class, 'store'])->name('image.store');

Route::get('profile/{user}', [ProfileController::class, 'trackVisit'])->name('profile.visit');

