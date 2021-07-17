<?php

use App\Models\User;
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
    // Para pruebas iniciales del Laravel Debugbar...
    $users = User::all();

    // Para que se produzca la excepción de DivisionByZeroError
    // a ser capturada por Sentry
    //// $x = 1 / 0;

    return view('welcome')->with([
        'users' => $users,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
