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

    if(!session()->has('test')){
        session('test',rand(20,22222222));
    }

    return [
        // 'time' => (microtime(true) - LARAVEL_START) * 1000,
        'memory' => memory_get_peak_usage() / 1024 / 1024,
        'server' => $_SERVER,
        'user' => User::all(),
        'session' => session('test'),
    ];
});
