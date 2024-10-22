<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::name('main.')->group(function() {
    Route::get('/', [App\Http\Controllers\Main\IndexController::class, 'index'])->name('index');
});

Route::prefix('words')->name('word.')->group(function() {
    Route::get('/', [App\Http\Controllers\Word\IndexController::class, 'index'])->name('index');
    Route::get('/{word}', [App\Http\Controllers\Word\ShowController::class, 'index'])->name('show');
    Route::delete('/{word}', [App\Http\Controllers\Word\DeleteController::class, 'index'])->name('delete');

});

Route::prefix('suggest')->name('suggest.')->group(function() {
    Route::get('/', [App\Http\Controllers\Suggest\IndexController::class, 'index'])->name('index');
    Route::get('/create', [App\Http\Controllers\Suggest\CreateController::class, 'index'])->name('create');
    Route::post('/', [App\Http\Controllers\Suggest\StoreController::class, 'index'])->name('store');
    Route::delete('/{word}', [App\Http\Controllers\Suggest\DeleteController::class, 'index'])->name('delete');
    Route::patch('/approved/{word}', [App\Http\Controllers\Suggest\ApprovedController::class, 'index'])->name('approved');
});

Route::prefix('tags')->name('tags.')->group(function() {
    Route::get('/', [App\Http\Controllers\Tags\IndexController::class, 'index'])->name('index');
});

Route::prefix('tag')->name('tag.')->group(function() {
    Route::get('/{tag}', [App\Http\Controllers\Tag\IndexController::class, 'index'])->name('index');
});

Route::middleware('auth')->group(function() {
    Route::prefix('wordtest')->name('wordtest.')->group(function() {
        Route::post('/test', [App\Http\Controllers\WordTest\IndexController::class, 'index'])->name('index');
    });
});
