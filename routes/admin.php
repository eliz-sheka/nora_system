<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\LabelController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VisitController;
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

Route::prefix('discount')->name('discount.')->group(function () {
    Route::get('/', [DiscountController::class, 'list'])->name('list');
    Route::get('deleted', [DiscountController::class, 'deletedList'])->name('list.deleted');
    Route::get('create', [DiscountController::class, 'create'])->name('create');
    Route::get('edit/{discount}', [DiscountController::class, 'edit'])->name('edit');
    Route::get('{discount}', [DiscountController::class, 'show'])->name('show');
    Route::post('/', [DiscountController::class, 'save'])->name('save');
    Route::patch('{discount}', [DiscountController::class, 'update'])->name('update');
    Route::delete('{discount}', [DiscountController::class, 'delete'])->name('delete');

    Route::middleware('role:admin')->group(function () {
        Route::delete('delete/{discount}', [DiscountController::class, 'forceDelete'])->name('delete.force');
    });
});

Route::prefix('visits')->name('visits.')->group(function () {
    Route::get('/', [VisitController::class, 'list'])->name('list');
    Route::get('deleted', [VisitController::class, 'deletedList'])->name('list.deleted');
    Route::get('create', [VisitController::class, 'create'])->name('create');
    Route::get('edit/{visit}', [VisitController::class, 'edit'])->name('edit');
    Route::get('{visit}', [VisitController::class, 'show'])->name('show');
    Route::get('related', [VisitController::class, 'showRelated'])->name('show.related');
    Route::get('close/{visit}', [VisitController::class, 'showClose'])->name('show.close');
    Route::post('/', [VisitController::class, 'save'])->name('save');
    Route::patch('close/{visit}', [VisitController::class, 'close'])->name('close');
    Route::patch('{visit}', [VisitController::class, 'update'])->name('update');
    Route::delete('{visit}', [VisitController::class, 'delete'])->name('delete');

    Route::middleware('role:admin')->group(function () {
        Route::delete('delete/{visit}', [VisitController::class, 'forceDelete'])->name('delete.force');
    });
});

