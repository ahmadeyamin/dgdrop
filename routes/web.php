<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

Route::get('/test', function () {
    if(!Session::has('test')){
        Session::put('test',rand(20,22222222));
    }

    return [
        // 'time' => (microtime(true) - LARAVEL_START) * 1000,
        'memory' => memory_get_peak_usage() / 1024 / 1024,
        'server' => $_SERVER,
        'user' => User::all(),
        'session' => Session::get('test'),
    ];
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
