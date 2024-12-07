<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\{PostController, UserController};

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

Route::get('/posts', [PostController::class,'index']);
Route::get('/posts/{id}', [PostController::class,'show']);

// User
Route::group(["prefix"=>"v1"], function()
{
    // Route::get('/auth/users', [UserController::class, 'index']);
    // Route::post('/auth/users', [UserController::class, 'store']);
    // Route::put('/auth/users/{user}', [UserController::class, 'update']);
    // Route::delete('/auth/users/{user}', [UserController::class, 'destroy']);

    Route::resource('/auth/users', UserController::class);
});

