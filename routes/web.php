<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\PembelianController;

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
    return redirect()->route('login');
});

// Admin Pages
Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin-dashboard');

    // Product
    Route::prefix('product')->group(function () {
        Route::get('/', [AdminController::class, 'product'])->name('admin-product');
        Route::post('/store', [AdminController::class, 'productStore'])->name('admin-product-store');
        Route::put('/add/{id}', [AdminController::class, 'productAdd'])->name('admin-product-add');
        Route::put('/update/{id}', [AdminController::class, 'productUpdate'])->name('admin-product-update');
        Route::delete('/destroy/{id}', [AdminController::class, 'productDelete'])->name('admin-product-delete');
    });

    // Transaction
    Route::prefix('transaction')->group(function () {
        Route::get('/', [PembelianController::class, 'index'])->name('admin-transaction');
        Route::get('/create', [PembelianController::class, 'create'])->name('cashier-transaction-create');
        Route::post('/store', [PembelianController::class, 'store'])->name('cashier-transaction-store');
        Route::get('/export/excel', [PembelianController::class, 'exportExcel'])->name('admin-transaction-excel');
        Route::get('/export/pdf/{id}', [PembelianController::class, 'exportPdf'])->name('admin-transaction-pdf');
        Route::delete('delete/{id}', [PembelianController::class, 'delete'])->name('admin-transaction-delete');
    });

    // User
    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('admin-user');
        Route::post('/store', [UserController::class, 'store'])->name('admin-user-store');
        Route::put('/update/{id}', [UserController::class, 'update'])->name('admin-user-update');
        Route::delete('/delete/{id}', [UserController::class, 'delete'])->name('admin-user-delete');
    });
});

// Cashier Pages
Route::prefix('cashier')->middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('auth.dashboard');
    });

    // Product
    Route::prefix('product')->group(function () {
        Route::get('/', [CashierController::class, 'productIndex'])->name('cashier-product');
    });

    // Transaction
    Route::prefix('transaction')->group(function () {
        Route::get('/', [CashierController::class, 'transactionIndex'])->name('cashier-transaction');
    });
});


Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login-action', [AuthController::class, 'loginAction'])->name('login-action');
});
// Route::post('/logout-action', [AuthController::class, 'logout'])->name('logout');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
