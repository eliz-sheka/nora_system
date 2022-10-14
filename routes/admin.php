<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('index');

Route::prefix('user')->name('user.')->group(function () {
    Route::get('/', [UserController::class, 'list'])->name('list');
    Route::get('deleted', [UserController::class, 'deletedList'])->name('list.deleted');
    Route::get('create', [UserController::class, 'create'])->name('create');
    Route::get('edit/{user}', [UserController::class, 'edit'])->name('edit');
    Route::get('{user}', [UserController::class, 'show'])->name('show');
    Route::post('/', [UserController::class, 'save'])->name('save');
    Route::patch('{user}', [UserController::class, 'update'])->name('update');
    Route::delete('{user}', [UserController::class, 'delete'])->name('delete');
    Route::middleware('role:admin')->delete('delete/{user}', [UserController::class, 'forceDelete'])->name('delete.force');
});

