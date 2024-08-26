<?php

use App\Http\Controllers\GeminiAIController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/portofolio', function () {
    return view('portofolio/index');
});

//gemini AI
Route::get('/chatbot', function () {
    return view('chatbot/index');
});
Route::post('/chatbot', [GeminiAIController::class, 'handleChat']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// //ini latihan routing
// Route::get('/search', [UserController::class, 'searchUser']);
// Route::get('/finduser/{id}', [UserController::class, 'findUser']);

//group routing by prefix
Route::prefix('search')->group(function () {
    Route::get('/', [UserController::class, 'searchUser']);
    Route::get('/{id}', [UserController::class, 'findUser']);
});
