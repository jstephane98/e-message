<?php

use App\Http\Controllers\MessageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

require __DIR__.'/auth.php';

Route::middleware('auth:sanctum')->group(function () {
   Route::controller(MessageController::class)->prefix('messages')->group(function () {
       Route::get('/', 'index');
       Route::post('/', 'store');
       Route::post('/change-state/{message}', 'changeState');
   });


});
