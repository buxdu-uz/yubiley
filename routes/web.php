<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('front.index');
})->name('main');

Route::get('/login', [AuthController::class,'loginPage'])->name('auth.login-page');
Route::post('/login', [AuthController::class,'login'])->name('auth.login');

Route::group(['middleware' => ['auth:web']], function () {
    Route::post('/logout', [AuthController::class,'logout'])->name('auth.logout');

//    MAIN PAGE
    Route::get('/main', [DashboardController::class,'index'])->name('dashboard');

//    ADMIN SECTION
    Route::group(['prefix' => 'admin'], function () {

    });

//    MANAGER SECTION
    Route::group(['prefix' => 'manager'], function () {

    });


});
