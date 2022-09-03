<?php

use App\Http\Controllers\API\BelController;
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


// day
Route::prefix('days')->group(function(){
    Route::get('/', [BelController::class, 'getDays']);
    Route::post('/create', [BelController::class, 'createDay']);
    Route::delete('/{id}', [BelController::class, 'deleteDay']);
});
// activity
Route::prefix('activity')->group(function(){
    Route::get('/', [BelController::class, 'getActivities']);
});
//schedule
Route::prefix('schedule')->group(function(){
    Route::get('/', [BelController::class, 'getSchedules']);
    Route::post('/store', [BelController::class, 'addSchedule']);
});
