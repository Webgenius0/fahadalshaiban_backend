<?php

use App\Http\Controllers\Web\Owner\DashboardController;
use App\Http\Controllers\Web\Owner\PageController;
use Illuminate\Support\Facades\Route;

Route::controller(DashboardController::class)->group(function () {
    Route::get('dashboard', 'index')->name('dashboard');
});

Route::controller(PageController::class)->group(function () {
    Route::get('page/tutorials', 'tutorials')->name('page.tutorials');
    Route::get('page/add/signage', 'signage')->name('page.add.signage');
    Route::get('page/income/statement', 'incomeStatement')->name('page.income.statement');
    Route::get('page/profile', 'profile')->name('page.profile');
});