<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\AccountController;
use App\Http\Controllers\Api\v1\CollectionController;
use App\Http\Controllers\Api\v1\TrackController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')
    ->group(function () {

        Route::prefix('accounts')
            ->group(function () {

                Route::get('{account}', [AccountController::class, 'getOne']);

                Route::get('{account}/tracks', [AccountController::class, 'tracks']);

                Route::get('{account}/tracks/{track}', [TrackController::class, 'getOne']);

                Route::get('{account}/collections', [AccountController::class, 'collections']);

                Route::post('{account}/collections', [CollectionController::class, 'store']);
                Route::get('{account}/collections/{collection}', [CollectionController::class, 'getOne']);
                Route::patch('{account}/collections/{collection}', [CollectionController::class, 'update']);


            });


    });




