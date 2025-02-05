<?php

use App\Http\Controllers\Web\Client\DashboardController;
use App\Http\Controllers\Web\Client\PageController;
use Illuminate\Support\Facades\Route;

Route::controller(DashboardController::class)->group(function () {
    Route::get('dashboard', 'index')->name('dashboard');
});

Route::controller(PageController::class)->group(function () {
    Route::get('page/tutorials', 'tutorials')->name('page.tutorials');
    Route::get('page/invoice-list', 'invoiceList')->name('page.invoice.list');
    Route::get('page/invoice', 'invoice')->name('page.invoice');
    Route::get('page/new/campaigns', 'newCampaigns')->name('page.new.campaigns');
    Route::get('page/billing', 'billing')->name('page.billing');
    Route::get('page/cart', 'cart')->name('page.cart');
    Route::get('page/started/form', 'startedForm')->name('page.started.form');
    Route::get('page/profile', 'profile')->name('page.profile');

    Route::get('/get-signage-location/{id}', 'getLocation')->name('page.location');
});