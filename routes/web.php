<?php

use App\Http\Controllers\Announcements\AnnouncementController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Congratulations\CongratulationController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\MainController;
use App\Http\Controllers\Persons\PersonController;
use App\Http\Controllers\Users\UserController;
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

// FRONTEND ROUTES
Route::get('/', [MainController::class,'index'])->name('main');
Route::get('/post/{type}',[MainController::class,'post'])->name('post.page');
Route::get('/register',[MainController::class,'register'])->name('register.page');
Route::post('/register',[PersonController::class,'store'])->name('register');

//AUTHENTICATION ROUTES
Route::get('/login', [AuthController::class, 'loginPage'])->name('auth.login-page');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

// AUTHENTICATION MIDDLEWARE

Route::group(['middleware' => ['multi-auth']], function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::get('/persons', [PersonController::class, 'index'])->name('persons.index');

//    MAIN PAGE
    Route::get('/main', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('congratulations', [CongratulationController::class, 'index'])->name('congratulations.index');
    Route::get('congratulations/{congratulation}/show', [CongratulationController::class, 'show'])->name('congratulations.show');

//    PERSON ROLE
    Route::group(['prefix' => 'person', 'as' => 'person.'], function () {
        Route::get('congratulations/create', [CongratulationController::class, 'create'])->name('congratulations.create');
        Route::post('congratulations', [CongratulationController::class, 'store'])->name('congratulations.store');
    });
});

Route::group(['middleware' => ['auth:web']], function () {
//    ADMIN SECTION
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['role:admin']], function () {
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/users', [UserController::class, 'storeManager'])->name('users.store');
    });

//    MANAGER SECTION
    Route::group(['prefix' => 'manager', 'as' => 'manager.', 'middleware' => ['role:manager']], function () {
        Route::get('announcements', [AnnouncementController::class, 'index'])->name('news.index');
        Route::get('announcements/create', [AnnouncementController::class, 'create'])->name('news.create');
        Route::get('announcements/{announcement}/show', [AnnouncementController::class, 'show'])->name('news.show');
        Route::get('announcements/edit', [AnnouncementController::class, 'edit'])->name('news.edit');
        Route::post('news/store', [AnnouncementController::class, 'store'])->name('news.store');
    });


});
