<?php

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
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InputController;


Route::get('/', [AuthController::class, 'showFormLogin'])->name('auth.login');
Route::get('login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showFormRegister'])->name('register');
Route::post('register-store', [AuthController::class, 'registrasi'])->name('registrasi.store');
Route::post('register', [AuthController::class, 'register']);


Route::group(['middleware' => 'auth'], function () { // Route di bawah hanya bisa diakses kalau sudah login
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard.index');
    Route::get('/digaram-user/{user_id}', [HomeController::class, 'diagram'])->name('diagram');

    Route::get('/tambah-data', [InputController::class, 'index'])->name('tambah.data');
    Route::post('/tambah-data/store', [InputController::class, 'store'])->name('tambah.store');




    // Route::middleware(['admin'])->group(function() {

    //         Route::get('admin', [DashboardController::class, 'index']);

    //         Route::get('category', [CategoryController::class, 'index']);

    //         Route::get('category/create', [CategoryController::class, 'create']);

    //         Route::post('category/store', [CategoryController::class, 'store']);

    //         Route::get('category/{id}', [CategoryController::class, 'show'])->where('id','[0-9]+');

    //         Route::get('category/{id}/edit', [CategoryController::class, 'edit'])->where('id','[0-9]+');

    //         Route::put('category/update/{id}', [CategoryController::class, 'update'])->where('id','[0-9]+');

    //         Route::delete('category/delete/{id}', [CategoryController::class, 'destroy'])->where('id','[0-9]+');


    //         Route::resource('product', ProductController::class);
    //         //Route::get('product/import', ProductController::class);


    //         Route::get('transaction', [TransactionController::class, 'index']);

    //         Route::get('transaction/import', [TransactionController::class, 'import']);

    //         Route::get('transaction/export', [TransactionController::class, 'export']);

    //         Route::post('transaction/store_import', [TransactionController::class, 'store_import']);

    // });

    Route::middleware(['user'])->group(function () {

        Route::get('home', function () {
            return view('user.home');
        });
    });

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});
