<?php

use App\Http\Controllers\AccountController; 
use App\Http\Controllers\HomeController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\GuestMiddleware;
use Illuminate\Support\Facades\Route;  
 

Route::get('/', [HomeController::class, 'index'])->name('home'); 
Route::group(['prefix' => 'account'], function(){ 
    Route::middleware(GuestMiddleware::class)->group(function(){ 
        Route::get('/register', [AccountController::class, 'registration'])->name('account.registration'); 
        Route::post('/process/registration', [AccountController::class, 'processRegistraion'])->name('account.processRegistration');
        Route::get('/login', [AccountController::class, 'login'])->name('account.login'); 
        Route::post('/authenticate', [AccountController::class, 'authenticate'])->name('account.authenticate'); 
    });

    Route::middleware(AuthMiddleware::class)->group(function(){ 
        Route::get('/profile', [AccountController::class, 'profile'])->name('account.profile'); 
        Route::put('/update-profile', [AccountController::class, 'updateProfile'])->name('account.updateProfile'); 
        Route::get('/logout', [AccountController::class, 'logout'])->name('account.logout'); 
        Route::post('/update-profile-pic', [AccountController::class, 'updateProfilePic'])->name('account.updateProfilePic'); 
        Route::get('/create-job', [AccountController::class, 'createJob'])->name('account.createJob'); 
        Route::post('/save-job', [AccountController::class, 'saveJob'])->name('account.saveJob'); 
    });
});
