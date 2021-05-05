<?php

use App\Http\Controllers\EtatDesLieuxController;
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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::prefix('/etat-des-lieux')->group(function () {

    Route::get('/', [EtatDesLieuxController::class, 'list']);
    Route::get('/{id}', [EtatDesLieuxController::class, 'retrieve']);
    Route::post('/', [EtatDesLieuxController::class, 'create']);
    Route::patch('/{id}', [EtatDesLieuxController::class, 'update']);
    Route::delete('/{id}', [EtatDesLieuxController::class, 'delete']);
});

