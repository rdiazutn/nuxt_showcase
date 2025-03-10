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
    return view('dashboard');
})->middleware('auth:users_web')->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/documentation/api', function () {
    return view('swagger.ui')
        ->with('token', \App\Models\Customer::first()->createUniqueToken('swagger')->plainTextToken)
        ->with('url', url('/openapi'));
})->middleware('auth:users_web')->name('swagger');
