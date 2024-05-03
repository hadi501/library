<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LendController;
use App\Http\Controllers\FineController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\DashboardController;

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
    return view('index', ['searchBar' => 'on']);
});

Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/book-detail/{id}', [BookController::class, 'bookDetail']);


Route::middleware(['auth'])->group(function() {

    Route::get('/user-dashboard', [DashboardController::class, 'userIndex']);

    Route::middleware(['checkRole:1|2|3'])->group(function() {
        Route::resource('book', BookController::class);
        Route::resource('lend', LendController::class);
        Route::resource('fine', FineController::class);

        Route::get('/admin', [DashboardController::class, 'adminIndex']);
    });

    Route::middleware(['checkRole:2|3'])->group(function() {
        Route::resource('finance', FinanceController::class);
    });

    Route::middleware(['checkRole:3'])->group(function() {
        Route::resource('user', UserController::class);
    });

});