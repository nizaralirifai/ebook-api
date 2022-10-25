<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\BookController;
use App\Http\Controllers\Authorcontroller;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('me', [Authcontroller::class, 'me']);

// Route::get('books', [Bookcontroler::class, 'index']);
// Route::get('books/{id}', [Bookcontroler::class, 'show']);
// Route::post('books', [Bookcontroler::class, 'store']);
// Route::put('books/{id}', [Bookcontroler::class, 'update']);
// Route::delete('books/{id}', [Bookcontroler::class, 'destroy']);

Route::resource('book', BookController::class)->except(
    ['create', 'edit']
);
Route::resource('author', AuthorController::class)->except(
    ['create', 'edit']
);
