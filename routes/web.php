<?php

use App\Http\Controllers\Web\Frontend\ContactUsController;
use App\Http\Controllers\Web\Frontend\HomeController;
use App\Http\Controllers\Web\Frontend\PageController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class, 'index'])->name('home');
Route::get('terms/conditions',[PageController::class, 'termsAndConditions'])->name('terms.conditions');
Route::get('privacy/policy',[PageController::class, 'privacyPolicy'])->name('privacy.policy');
Route::get('refund/policy',[PageController::class, 'refundPolicy'])->name('refund.policy');
Route::get('cookie/policy',[PageController::class, 'cookiePolicy'])->name('cookie.policy');
Route::get('pro/tips',[PageController::class, 'proTips'])->name('pro.tips');
Route::get('join/signage/owner',[PageController::class, 'joinAsSignageOwner'])->name('join.signage.owner');


Route::get('contact/us',[ContactUsController::class, 'index'])->name('contact.us');




// Routes for running artisan commands
Route::get('/run-migrate-fresh', function () {
    try {
        $output = Artisan::call('migrate:fresh', ['--seed' => true]);
        return response()->json([
            'message' => 'Migrations executed.',
            'output' => nl2br($output)
        ], 200);
    } catch (\Exception $e) {
        return response()->json([
            'message' => 'An error occurred while running migrations.',
            'error' => $e->getMessage(),
        ], 500);
    }
});

require __DIR__.'/auth.php';
