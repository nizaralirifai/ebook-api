<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('coba',function(){
    return "kamu jomblo yaa";

});

Route::get('coba', function(){
    return['petra','mus', 'strarry'];
});

Route::get('coba2', function(){
    return[
        'nama' => 'Nizar Ali',
        'kelas' => 'XII RPL 5',
        'nis' => 3103120166
    ];
});

Route::get('coba3', function(){
    return response()->json(
        [
        'nama' => 'Nizar Ali',
        'kelas' => 'XII RPL 5',
        'nis' => 3103120166
        ],201
    );
});


