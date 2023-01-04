<?php

use App\Http\Controllers\Api\Agama58Controller;
use App\Http\Controllers\api\Detaildata58Controller;
use App\Http\Controllers\api\User58Controller;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

route::resource('/agama58', Agama58Controller::class);

route::resource('/detaildata58', DetailData58Controller::class);

route::resource('/user58', User58Controller::class);
Route::put('/user58/update/image/{id}', [User58Controller::class, 'editimage'])->name('user58.editimage');
Route::put('/user58/update/password/{id}', [User58Controller::class, 'editpassword'])->name('user58.editpassword');

// detail
route::resource('/detaildata58', Detaildata58Controller::class);
