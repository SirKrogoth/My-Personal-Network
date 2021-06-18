<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\TimeLineController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/', [TimeLineController::class, 'index'])->name('timeline');
Route::post('/store', [TimeLineController::class, 'store'])->name('storetweet');
