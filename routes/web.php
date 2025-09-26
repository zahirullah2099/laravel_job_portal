<?php

use App\Http\Middleware\checkAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobsController;
use App\Http\Middleware\GuestMiddleware;
use App\Http\Controllers\resumeController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\admin\JobController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\auth\GoogleController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\auth\facebookController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\JobApplicationController;

Route::get('chatify/{id}', function () {
    return view('vendor.Chatify.pages.app');
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/jobs', [JobsController::class, 'index'])->name('jobs');
Route::get('/job/detail/{id}', [JobsController::class, 'detail'])->name('jobDetail');
Route::post('/apply-job', [JobsController::class, 'applyJob'])->name('applyJob');
Route::post('/save-job', [JobsController::class, 'saveJob'])->name('saveJob');

Route::get('/forgot-password', [AccountController::class, 'forgotPassword'])->name('account.forgotPassword');
Route::post('/process-forgot-password', [AccountController::class, 'processForgotPassword'])->name('account.processForgotPassword');
Route::get('/process-forgot/{token}', [AccountController::class, 'resetPassword'])->name('account.resetPassword');
Route::post('/process-reset-password', [AccountController::class, 'ProcessResetPassword'])->name('account.ProcessResetPassword');

Route::group(['prefix' => 'admin'], function () {
    Route::middleware(checkAdmin::class)->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/users', [UserController::class, 'index'])->name('admin.users');
        Route::get('/users/{id}', [UserController::class, 'edit'])->name('admin.users.edit');
        Route::put('/users/{id}', [UserController::class, 'update'])->name('admin.users.update');
        Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');
        Route::get('/jobs', [JobController::class, 'index'])->name('admin.jobs');
        Route::get('/jobs/edit/{id}', [JobController::class, 'edit'])->name('admin.jobs.edit');
        Route::put('/jobs/{id}', [JobController::class, 'update'])->name('admin.jobs.update');
        Route::delete('/jobs', [JobController::class, 'destroy'])->name('admin.jobs.destroy');
        Route::get('/expired-jobs', [JobController::class, 'expiredJobs'])->name('admin.expiredJobs');
        Route::get('/job-applications', [JobApplicationController::class, 'index'])->name('admin.jobApplications');
        Route::delete('/job-applications', [JobApplicationController::class, 'destroy'])->name('admin.jobApplications.destroy');
    });
});

// Register and login
Route::group(['prefix' => 'account'], function () {
    Route::middleware(GuestMiddleware::class)->group(function () {
        Route::get('/register', [AccountController::class, 'registration'])->name('account.registration');
        Route::post('/process/registration', [AccountController::class, 'processRegistraion'])->name('account.processRegistration');
        Route::get('/login', [AccountController::class, 'login'])->name('account.login');
        Route::post('/authenticate', [AccountController::class, 'authenticate'])->name('account.authenticate');
    });

    Route::middleware(AuthMiddleware::class)->group(function () {
        Route::get('/profile', [AccountController::class, 'profile'])->name('account.profile');
        Route::put('/update-profile', [AccountController::class, 'updateProfile'])->name('account.updateProfile');
        Route::get('/logout', [AccountController::class, 'logout'])->name('account.logout');
        Route::post('/update-profile-pic', [AccountController::class, 'updateProfilePic'])->name('account.updateProfilePic');
        Route::get('/create-job', [AccountController::class, 'createJob'])->name('account.createJob');
        Route::post('/save-job', [AccountController::class, 'saveJob'])->name('account.saveJob');
        Route::get('/my-jobs', [AccountController::class, 'myJob'])->name('account.myJob');
        Route::get('/my-jobs/edit/{jobId}', [AccountController::class, 'editJob'])->name('account.editJob');
        Route::post('/update-job/{jobId}', [AccountController::class, 'updateJob'])->name('account.updateJob');
        Route::post('/delete-job', [AccountController::class, 'deleteJob'])->name('account.deleteJob');
        Route::get('/my-job-application', [AccountController::class, 'myJobApplications'])->name('account.myJobApplications');
        Route::post('/remove-job-application', [AccountController::class, 'removeJobs'])->name('account.removeJobs');
        Route::post('/update-password', [AccountController::class, 'updatePassword'])->name('account.updatePassword');
        Route::get('/saved-jobs', [AccountController::class, 'savedJobs'])->name('account.savedJobs');
        Route::post('/remove-savedjob', [AccountController::class, 'removeSavedjob'])->name('account.removeSavedjob');
        Route::get('/view-resume/{id}', [resumeController::class, 'viewResume'])->name('employer.viewResume');
        Route::get('/download-resume/{file}', [ResumeController::class, 'downloadResume'])->name('downloadResume');
        Route::get('/createResume', [resumeController::class, 'createResume'])->name('create.Resume');
        Route::get('/showResume', [resumeController::class, 'showResume'])->name('show.Resume');
        Route::post('/submit-resume', [ResumeController::class, 'storeResume'])->name('resume.store');
        Route::get('/account/resume/download', [ResumeController::class, 'download'])->name('resume.download');
        Route::post('/applicant/status', [AccountController::class, 'updateApplicantStatus'])->name('employer.applicant.status');


    });
}); 
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('redirect.google');
Route::get('auth/google/callback', [GoogleController::class, 'hangleGoogleCallback']);

Route::get('auth/facebook', [facebookController::class, 'redirectToFacebook'])->name('redirect.facebook');
Route::get('auth/facebook/callback', [facebookController::class, 'handleFacebookCallback']);

Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
