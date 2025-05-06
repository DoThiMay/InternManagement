<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InternController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LichController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\TiendoController;
use App\Http\Controllers\BaocaoController;
use App\Http\Controllers\DashboardController;
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

Route::get('/login', [AdminController::class, 'login'])->name('loginAdmin');
Route::post('/login', [AdminController::class, 'LoginAdmin'])->name('LoginAdmin');
Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

Route::middleware(['auth:intern'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
});

Route::prefix('admin')->group(function () {
    Route::prefix('intern')->group(function () {
        Route::get('/', [InternController::class, 'index'])->name('interns.index');
        Route::get('/create', [InternController::class, 'create'])->name('interns.create');
        Route::post('/store', [InternController::class, 'store'])->name('interns.store');
        Route::get('/edit/{id}', [InternController::class, 'edit'])->name('interns.edit');
        Route::post('/update/{id}', [InternController::class, 'update'])->name('interns.update');
        Route::get('/delete/{id}', [InternController::class, 'delete'])->name('interns.delete');
    });
    Route::prefix('program')->group(function () {
        Route::get('/', [ProgramController::class, 'index'])->name('programs.index');
        Route::get('/create', [ProgramController::class, 'create'])->name('programs.create');
        Route::post('/store', [ProgramController::class, 'store'])->name('programs.store');
        Route::get('/edit/{id}', [ProgramController::class, 'edit'])->name('programs.edit');
        Route::post('/update/{id}', [ProgramController::class, 'update'])->name('programs.update');
        Route::get('/delete/{id}', [ProgramController::class, 'delete'])->name('programs.delete');
    });
    Route::prefix('lich')->group(function () {
        Route::get('/show', [LichController::class, 'adminShow'])->name('admin.lich.show');
        Route::get('/edit/{id}', [LichController::class, 'adminEdit'])->name('admin.lich.edit');
        Route::post('/update/{id}', [LichController::class, 'adminUpdate'])->name('admin.lich.update');
        Route::get('/search', [LichController::class, 'adminSearch'])->name('admin.lich.search');
    });
    Route::prefix('tiendo')->group(function () {
        Route::get('/index', [TiendoController::class, 'index'])->name('admin.tiendo.index');
        Route::get('/create', [TiendoController::class, 'show'])->name('admin.tiendo.create');
        Route::post('/store', [TiendoController::class, 'store'])->name('admin.tiendo.store');
        Route::get('/edit/{id}', [TiendoController::class, 'editTiendo'])->name('admin.tiendo.edit');
        Route::post('/update/{id}', [TiendoController::class, 'updateTiendo'])->name('admin.tiendo.update');
        Route::get('/search', [TiendoController::class, 'searchTiendo'])->name('admin.tiendo.search');
    });

    Route::prefix('baocao')->group(function () {
        Route::get('/', [BaocaoController::class, 'index'])->name('baocao.index');
        Route::get('/create', [BaocaoController::class, 'create'])->name('baocao.create');
        Route::post('/store', [LichController::class, 'store'])->name('baocao.store');
        Route::get('/edit/{id}', [LichController::class, 'edit'])->name('lich.edit');
        Route::post('/update/{id}', [LichController::class, 'update'])->name('lich.update');
    });

});
Route::get('/home', function () {
    return view('home');
});

Route::prefix('lich')->group(function () {
    Route::get('/', [LichController::class, 'index'])->name('lich.index');
    Route::get('/create', [LichController::class, 'create'])->name('lich.create');
    Route::post('/store', [LichController::class, 'store'])->name('lich.store');
    Route::get('/edit/{id}', [LichController::class, 'edit'])->name('lich.edit');
    Route::post('/update/{id}', [LichController::class, 'update'])->name('lich.update');
});

