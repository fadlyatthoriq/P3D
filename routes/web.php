<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\Admin\UserController;
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

route::middleware('auth', 'verified')->group(function () {
    route::resource('index', IndexController::class);
    route::get('/',[IndexController::class, 'index'])->name('data-pajak.index');
    route::get('/data-pajak/{id}/edit', [IndexController::class, 'edit'])->name('data-pajak.edit');
    Route::put('/data-pajak/{id}', [IndexController::class, 'update'])->name('data-pajak.update');
    Route::delete('/{id}', [IndexController::class, 'destroy'])->name('data-pajak.destroy');
    route::get('/maps', [MapController::class, 'index'])->name('maps');
    route::get('/assets/layerPolygon', function(){
        return response()->file(public_path('assets/polygonBekasi.geojson'));
    });
    route::get('/api/markers', [MapController::class, 'marker']);
});

route::get('/logins', function(){
    return view('auth.logins');
});

Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index'); // Menampilkan daftar user
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create'); // Menampilkan form tambah user
    Route::post('/users', [UserController::class, 'store'])->name('users.store'); // Menyimpan user baru
    route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    route::delete('users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
});

require __DIR__.'/auth.php';
