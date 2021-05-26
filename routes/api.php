<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\StudentsController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return response()->json($request->user());
});


Route::prefix('v1')->middleware('api.verify')->group(function(){
    Route::get('/students', [StudentsController::class, 'get']);
    Route::post('/dump', [StudentsController::class, 'dumpRequest']);
});

Route::prefix('v2')->middleware('api.verify')->group(function(){
    Route::get('/students', [\App\Http\Controllers\Api\V2\StudentsController::class, 'get']);
    Route::post('/dump', [StudentsController::class, 'dumpRequest']);
});

Route::post('/login', [LoginController::class, 'login']);
Route::get('/the-user', function (Request $request){
    return $request->user();
})->middleware('auth:api');
