<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LendController;
use App\Http\Controllers\FineController;
use App\Http\Controllers\RateController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\TrackerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\FavoriteController;
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

// Route::get('/', function () {
//     return view('index', ['searchBar' => 'on']);
// });

Route::get('/', [BookController::class, 'home']);

Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/book-detail/{id}', [BookController::class, 'show']);
Route::get('/home-search', [BookController::class, 'search']);
Route::get('/email', [EmailController::class, 'index']);
Route::get('/send-email', [EmailController::class, 'sendEmail']);
Route::get('/token-view', [EmailController::class, 'tokenView']);
Route::post('/token', [EmailController::class, 'tokenValidate']);
// Route::get('/change-password', [EmailController::class, 'changePassIndex']);
Route::post('/changepass', [AuthController::class, 'changePass']);


Route::middleware(['auth'])->group(function() {

    // User
    Route::get('/user-dashboard', [DashboardController::class, 'userIndex']);
    Route::get('/user-lend', [LendController::class, 'userLend']);
    Route::get('/user-profile', [UserController::class, 'userIndex']);
    Route::post('/user-update/{id}', [UserController::class, 'userUpdate'])->name('update.user');
    Route::resource('favorite', FavoriteController::class);
    Route::resource('rate', RateController::class);
    Route::resource('tracker', TrackerController::class);
    // Route::resource('profile', ProfileController::class);
 
    // Admin, Bendahara, Super Admin
    Route::middleware(['checkRole:1|2|3'])->group(function() {
        
        Route::resource('book', BookController::class);
        Route::resource('lend', LendController::class);
        Route::resource('fine', FineController::class);

        Route::get('/admin', [DashboardController::class, 'adminIndex']);
        
        // History
        Route::get('/lends/history', [LendController::class, 'history']);
        Route::get('/fines/history', [FineController::class, 'history']);
    });

    // Bendahara, Super Admin
    Route::middleware(['checkRole:2|3'])->group(function() {
        Route::resource('finance', FinanceController::class);
    });

    // Super Admin
    Route::middleware(['checkRole:3'])->group(function() {
        Route::resource('user', UserController::class);

        //Export Excel
        Route::get('/books/export/excel', [BookController::class, 'export_excel']);
        Route::get('/lends/export/excel', [LendController::class, 'export_excel']);
        Route::get('/fines/export/excel', [FineController::class, 'export_excel']);
        Route::get('/users/export/excel', [UserController::class, 'export_excel']);
    });

});

// JSON data
Route::get('/get-book', [Controller::class, 'getBook']);
Route::get('/get-user', [Controller::class, 'getUser']);
Route::get('/get-lend', [Controller::class, 'getLend']);

//Clear Cache facade value:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});

Route::get('/key', function(){
    try {

        artisan::call('key:generate');
        return '<h1>Key generate</h1>';
      
      } catch (\Exception $e) {
      
          echo $e->getMessage();
      }
    
});