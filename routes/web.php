<?php

use App\Http\Controllers\DrawController;
use App\Http\Controllers\UpController;
use Illuminate\Support\Facades\Route;
// use Image;

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

Route::get('/img', [UpController::class, 'index'])->name('img');
Route::post('/img', [UpController::class, 'calc'])->name('img_calc');

Route::get('/draw', [DrawController::class, 'draw'])->name('draw');
