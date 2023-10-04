<?php

use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\AdminMedicineController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MedicineController;
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

Route::get('/', HomeController::class)->name('home');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LogoutController::class, 'destroy'])->name('logout');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', DashboardController::class)->middleware('auth')->name('dashboard');
});

Route::get('/medicines', [MedicineController::class, 'index'])->name('medicine.list');
Route::get('/medicine/{id}', [MedicineController::class, 'show'])->name('medicine.show');

Route::get('/category/{category}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/{medicine}', [CartController::class, 'store'])->name('cart.store');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin-dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::post('/admin-logout', [AdminDashboardController::class, 'logout'])->name('admin.logout');

    Route::get('/admin-medicines', [AdminMedicineController::class, 'index'])->name('admin.medicines');
    Route::get('/admin-medicines/new', [AdminMedicineController::class, 'show'])->name('admin.medicines.new');
    Route::post('/admin-medicines', [AdminMedicineController::class, 'store'])->name('admin.medicines.store');
    Route::get('/admin-medicines/{id}', [AdminMedicineController::class, 'edit'])->name('admin.medicines.edit');
    Route::put('/admin-medicines/{id}', [AdminMedicineController::class, 'update'])->name('admin.medicines.update');

    Route::get('/admin-orders', [AdminOrderController::class, 'index'])->name('admin.orders');
    Route::put('/admin-orders/{id}', [AdminOrderController::class, 'update'])->name('admin.orders.update');
});
