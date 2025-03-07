<?php

use App\Http\Controllers\ToDoController;
use App\Http\Controllers\UserAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group([ 'middleware' => 'auth:sanctum' ], function() {
    //To DO
    Route::resource('todo', ToDoController::class);
    Route::patch('todo/{id}/status', [ToDoController::class, 'updateStatus']);
    //logout
    Route::post('/logout', [UserAuthController::class,'logout']);

});

//Register & Login
Route::post('/register', [UserAuthController::class,'signup']);
Route::post('/login', [UserAuthController::class,'login']);

