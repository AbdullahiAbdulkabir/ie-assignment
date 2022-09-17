<?php

use App\Http\Controllers\ListExternalBooksController;
use App\Http\Controllers\ListUserController;
use Illuminate\Http\Request;
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
//        Route::get('', ListUserController::class)
//            ->name('list');
    });

//http://127.0.0.1:7000/api/users?name=&phone=880&address=ayana
Route::get('external-books', ListExternalBooksController::class);
