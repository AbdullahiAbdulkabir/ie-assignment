<?php

use App\Http\Controllers\CreateBookController;
use App\Http\Controllers\DeleteBookController;
use App\Http\Controllers\GetBookController;
use App\Http\Controllers\ListBooksController;
use App\Http\Controllers\ListExternalBooksController;
use App\Http\Controllers\UpdateBookController;
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


Route::prefix('v1/books')->as('books.')
    ->group(function () {
        Route::post('', CreateBookController::class)
            ->name('create');
        Route::get('{book:id}', GetBookController::class)
            ->name('get');
        Route::get('', ListBooksController::class)
            ->name('list');
        Route::patch('{book:id}', UpdateBookController::class)
            ->name('update');
        Route::delete('{book:id}', DeleteBookController::class)
            ->name('delete');
        Route::delete('{book:id}', DeleteBookController::class)
            ->name('delete');
    });


Route::get('external-books', ListExternalBooksController::class);
