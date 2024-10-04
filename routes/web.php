<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\MainController@index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('main')->name('main.')->group(function() {
    Route::get('/', [App\Http\Controllers\Main\IndexController::class, 'index'])->name('index');
});
Route::prefix('all')->name('all.')->group(function() {
    Route::get('/', [App\Http\Controllers\All\IndexController::class, 'index'])->name('index');
});

Route::prefix('word')->name('word.')->group(function() {
    Route::get('/{word}', [App\Http\Controllers\Word\IndexController::class, 'index'])->name('index');
    Route::delete('/{word}', [App\Http\Controllers\Word\DeleteController::class, 'index'])->name('delete');
});

Route::prefix('tag')->name('tag.')->group(function() {
    Route::get('/{tag}', [App\Http\Controllers\Tag\IndexController::class, 'index'])->name('index');
});

Route::middleware('auth')->group(function() {
    Route::prefix('wordtest')->name('wordtest.')->group(function() {
        Route::post('/test', [App\Http\Controllers\WordTest\IndexController::class, 'index'])->name('index');
    });
});
