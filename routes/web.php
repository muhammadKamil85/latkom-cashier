<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware('guest')->get('/landing-page', function () {
    return view('partials.main');
})->name('landing-page');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin-dashboard');
    Route::get('/product', [AdminController::class, 'product'])->name('admin-product');
});
Route::get('/dashboard', function () {
    return view('auth.dashboard');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login-action', [AuthController::class, 'loginAction'])->name('login-action');
Route::post('/logout-action', [AuthController::class, 'logout'])->name('logout');
