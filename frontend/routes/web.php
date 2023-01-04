<?php

use App\Http\Controllers\Agama58Controller;
use App\Http\Controllers\Auth58Controller;
use App\Http\Controllers\User58Controller;
use App\Http\Controllers\Detaildata58Controller;
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
    return view('welcome', [
        'page' => "Home"
    ]);
})->middleware('auth');


// auth
Route::get('/login58', [Auth58Controller::class, 'login'])->name('login');
Route::get('/register58', [Auth58Controller::class, 'register'])->name('auth58.register');
Route::get('/logout58', [Auth58Controller::class, 'logout'])->name('auth58.logout');

Route::post('/login58', [Auth58Controller::class, 'loginP'])->name('auth58.loginP');
Route::post('/register58', [Auth58Controller::class, 'registerP'])->name('auth58.registerP');

Route::middleware('auth')->group(function () {
    // agama
    Route::resource('/agama58', Agama58Controller::class)->middleware('admin');

    // my
    Route::get('/myprofile58', [User58Controller::class, 'myprofile'])->name('user58.myprofile');
    Route::put('/myprofile58/edit/image/{id}', [User58Controller::class, 'editimage'])->name('user58.editimage');
    Route::put('/myprofile58/edit/password/{id}', [User58Controller::class, 'editpassword'])->name('user58.editpassword');

    // user
    Route::resource('/user58', User58Controller::class)->middleware('admin');

    // detail
    Route::resource('/detaildata58', Detaildata58Controller::class);
});
