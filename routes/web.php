<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\PeopleController::class, 'index']);
Route::prefix('people')->group(function () {
    Route::get('/', [App\Http\Controllers\PeopleController::class, 'people']);
    Route::get('/create', [App\Http\Controllers\PeopleController::class, 'create']);
    Route::post('/', [App\Http\Controllers\PeopleController::class, 'store']);
    Route::get('/{id}', [App\Http\Controllers\PeopleController::class, 'show']);
    Route::get('/{id}/edit', [App\Http\Controllers\PeopleController::class, 'edit']);
    Route::patch('/{id}', [App\Http\Controllers\PeopleController::class, 'update']);
    Route::delete('/{id}', [App\Http\Controllers\PeopleController::class, 'destroy']);

    Route::post('/query', [App\Http\Controllers\PeopleController::class, 'query']);
});
