<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\TagsController;
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
//
//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::resource('posts', PostsController::class, ['except' => ['edit', 'create']]);
Route::resource('tags', TagsController::class, ['except' => ['edit', 'create']]);
Route::fallback(function () {
    return response()->json(['error' => 'Not Found!'], 404);
});
