<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LabelController;
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

    Route::middleware('role:admin')->group(function () {
        Route::patch('block/{user}', [UserController::class, 'block'])->name('block');
        Route::patch('unblock/{user}', [UserController::class, 'unblock'])->name('unblock');
        Route::delete('delete/{user}', [UserController::class, 'forceDelete'])->name('delete.force');
    });
});

Route::prefix('label')->name('label.')->group(function () {
    Route::get('/', [LabelController::class, 'list'])->name('list');
    Route::get('deleted', [LabelController::class, 'deletedList'])->name('list.deleted');
    Route::get('create', [LabelController::class, 'create'])->name('create');
    Route::get('edit/{label}', [LabelController::class, 'edit'])->name('edit');
    Route::get('{label}', [LabelController::class, 'show'])->name('show');
    Route::post('/', [LabelController::class, 'save'])->name('save');
    Route::patch('{label}', [LabelController::class, 'update'])->name('update');
    Route::delete('{label}', [LabelController::class, 'delete'])->name('delete');

    Route::middleware('role:admin')->group(function () {
        Route::delete('delete/{label}', [LabelController::class, 'forceDelete'])->name('delete.force');
    });
});

