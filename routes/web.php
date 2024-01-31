<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminHomeController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [AdminHomeController::class, 'index'])->name('admin.index');

Route::get('/search', [AdminHomeController::class, 'search'])->name('admin.search');

Route::get('/create', [AdminHomeController::class, 'showCreateForm'])->name('admin.showCreateForm');
Route::post('/store', [AdminHomeController::class, 'store'])->name('admin.store');

Route::get('/edit/{id}', [AdminHomeController::class, 'showEditForm'])->name('admin.showEditForm');
Route::post('/update/{id}', [AdminHomeController::class, 'update'])->name('admin.update');

Route::get('/delete/{id}', [AdminHomeController::class, 'showDeleteForm'])->name('admin.showDeleteForm');
Route::post('/delete/{id}', [AdminHomeController::class, 'destroy'])->name('admin.delete');

Route::get('/remove/{id}', [AdminHomeController::class, 'showRemoveForm'])->name('admin.showRemoveForm');
Route::post('/remove/{id}', [AdminHomeController::class, 'remove'])->name('admin.remove');

Route::get('/sort/{field}', [AdminHomeController::class, 'sort'])->name('admin.sort');
