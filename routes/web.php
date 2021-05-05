<?php

use App\Http\Controllers\EtatDesLieuxController;
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

Route::get('/etat-des-lieux', [EtatDesLieuxController::class, 'createForm']);

Route::post('/etat-des-lieux', [EtatDesLieuxController::class, 'create'])->name('create');

