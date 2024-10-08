<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::name('main.')->group(function() {
    Route::get('/', [App\Http\Controllers\Main\IndexController::class, 'index'])->name('index');
});

Route::prefix('words')->name('words.')->group(function() {
    Route::get('/', [App\Http\Controllers\Words\IndexController::class, 'index'])->name('index');
});

Route::prefix('tags')->name('tags.')->group(function() {
    Route::get('/', [App\Http\Controllers\Tags\IndexController::class, 'index'])->name('index');
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
